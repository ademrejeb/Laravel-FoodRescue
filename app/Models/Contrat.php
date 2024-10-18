<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'date_debut',
        'date_fin',
        'statut',
        'document',
        'partenaire_id', 
    ];


    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
    public function histories()
    {
        return $this->hasMany(ContratHistory::class);
    }
      // Accessor for formatted date_debut
      public function getDateDebutAttribute($value)
      {
          return \Carbon\Carbon::parse($value)->format('d-m-Y');
      }
  
      // Accessor for formatted date_fin
      public function getDateFinAttribute($value)
      {
          return \Carbon\Carbon::parse($value)->format('d-m-Y');
      }
  
      // Store document method
      public function storeDocument($file)
      {
          return $file->store('documents');
      }
  
      // Get document URL method
      public function getDocumentUrlAttribute()
      {
          return asset('storage/' . $this->document);
      }
}
