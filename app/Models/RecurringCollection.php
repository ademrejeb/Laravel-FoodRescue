<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',                // Nouveau champ
        'email',               // Nouveau champ
        'phone',               // Nouveau champ
        'frequency',           // Champ existant
        'comments',            // Nouveau champ
        'contact_preference',  // Nouveau champ
    ];
}
