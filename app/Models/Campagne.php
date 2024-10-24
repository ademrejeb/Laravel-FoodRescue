<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;
    protected $table = 'campagnes';
    protected $fillable = ['nom', 'date_debut', 'date_fin', 'objectif_quantite', 'statut'];

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }
}

