<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;


    protected $fillable = [
        'type',
        'capacite',
        'disponibilite', 
        'transporteur_id'
    ];
    public function transporteur()
    {
        return $this->belongsTo(Transporteur::class);
    }
}
