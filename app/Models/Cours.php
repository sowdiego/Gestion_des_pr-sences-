<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Cours extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'heure_debut', 'heure_fin', 'salle_id', 'professeur_id'];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function professeur()
    {
        return $this->belongsTo(User::class, 'professeur_id');
    }
}
