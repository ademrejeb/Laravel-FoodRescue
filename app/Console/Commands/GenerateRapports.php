<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Livraison;
use PDF;
use Illuminate\Support\Facades\Storage;

class GenerateRapports extends Command
{
    protected $signature = 'rapports:generate {periode=daily}';
    protected $description = 'Génération automatique de rapports périodiques';

    public function handle()
    {
        $periode = $this->argument('periode');
        $livraisons = Livraison::with('collecte')
            ->when($periode == 'daily', fn($q) => $q->whereDate('created_at', today()))
            ->when($periode == 'weekly', fn($q) => $q->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]))
            ->when($periode == 'monthly', fn($q) => $q->whereMonth('created_at', now()->month))
            ->get();

        $pdf = PDF::loadView('livraisons.pdf', compact('livraisons'));
        $filename = "rapports/rapport_{$periode}.pdf";
        Storage::put($filename, $pdf->output());

        $this->info("Rapport {$periode} généré avec succès : {$filename}");
    }
}
