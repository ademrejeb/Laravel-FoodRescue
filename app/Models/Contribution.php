<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;
    protected $table = 'contributions';
    protected $fillable = ['quantite', 'date', 'donateur_id', 'campagne_id'];

    public function campagne()
    {
        return $this->belongsTo(Campagne::class);
    }

    public function donateur()
    {
        return $this->belongsTo(Donator::class);
    }
}

