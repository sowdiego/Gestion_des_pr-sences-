<?php

namespace App\Mail;

use App\Models\Cours;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CoursAjouteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cours;

    public function __construct(Cours $cours)
    {
        $this->cours = $cours;
    }

    public function build()
    {
        return $this->subject('Nouveau cours ajouté')
            ->view('emails.cours_ajoute')
            ->with([
                'nom' => $this->cours->nom,
                'description' => $this->cours->description,
                'heure_debut' => $this->cours->heure_debut,
                'heure_fin' => $this->cours->heure_fin,
                'salle' => $this->cours->salle->libelle,
                'professeur' => $this->cours->professeur->nom . ' ' . $this->cours->professeur->prenom,
            ]);
    }
}
