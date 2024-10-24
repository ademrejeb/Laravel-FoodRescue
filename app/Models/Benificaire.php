<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Benificaire extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'benificaires';

    protected $fillable = [
        'nom',
        'adresse',
        'tel',
        'email',
        'type',
        'image',
    ];
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}
