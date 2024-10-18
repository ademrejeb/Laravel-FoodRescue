<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $fillable = ['montant', 'type_contribution', 'date_contribution', 'partenaire_id'];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
    public function sponsorships()
    {
        return $this->hasMany(Sponsorship::class);
    }
}
