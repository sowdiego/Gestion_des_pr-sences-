<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Emargement;


class EmargementsExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Emargement::query();

        if ($this->request->filled('date_debut') && $this->request->filled('date_fin')) {
            $query->whereBetween('date', [$this->request->date_debut, $this->request->date_fin]);
        }

        return $query->with(['professeur', 'cours'])->get()->map(function ($emargement) {
            return [
                'Professeur' => $emargement->professeur->nom . ' ' . $emargement->professeur->prenom,
                'Cours' => $emargement->cours->nom,
                'Date' => $emargement->date,
                'Statut' => $emargement->statut
            ];
        });
    }

    public function headings(): array
    {
        return ['Professeur', 'Cours', 'Date', 'Statut'];
    }
}
