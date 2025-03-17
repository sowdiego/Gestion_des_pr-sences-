<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /*User::create([
            'nom' => 'Admin',
            'prenom' => 'Super',
            'email' => 'admin@isi.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        User::create([
            'nom' => 'Lo',
            'prenom' => 'Professeur',
            'email' => 'prof@isi.com',
            'password' => Hash::make('12345678'),
            'role' => 'professeur'
        ]);

        User::create([
            'nom' => 'Anta',
            'prenom' => 'Gestionnaire',
            'email' => 'gestionnaire@isi.com',
            'password' => Hash::make('12345678'),
            'role' => 'gestionnaire'
        ]);*/
        // $this->call(SalleSeeder::class);
    }
}
