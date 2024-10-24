<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporteur extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'telephone',
        'email'
    ];

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
