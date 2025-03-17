<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emargement extends Model
{
    protected $fillable = ['date', 'statut', 'professeur_id', 'cours_id'];

    public function professeur()
    {
        return $this->belongsTo(User::class, 'professeur_id');
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
