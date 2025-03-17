<?php

namespace Database\Seeders;
use App\Models\Salle;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalleSeeder extends Seeder
{
    public function run()
    {
        $salles = ['Salle 10', 'Salle 20', 'Salle 30', 'Amphi A', 'Amphi B'];

        foreach ($salles as $libelle) {
            Salle::create(['libelle' => $libelle]);
        }
    }
}
