<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratHistory extends Model
{
    use HasFactory;

    protected $fillable = ['contrat_id', 'changes', 'user_id'];

    // Relation avec le contrat
    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
