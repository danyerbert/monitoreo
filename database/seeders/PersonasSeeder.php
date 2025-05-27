<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;
class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Persona::create([
            'nombre_completo' => 'Juliet Brito'
        ]);
        Persona::create([
            'nombre_completo' => 'Jennifer Benitez'
        ]);
        Persona::create([
            'nombre_completo' => 'Kleber Salazar'
        ]);
    }
}
