<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collecte extends Model
{
    use HasFactory;
    
    protected $fillable = ['date_collecte', 'statut','quantite_collecte', 'donateur_id'];

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }
 
    public function donateur()
    {
        return $this->belongsTo(Donator::class, 'donateur_id');
    }
}
