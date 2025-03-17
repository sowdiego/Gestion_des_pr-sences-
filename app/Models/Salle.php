<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}
