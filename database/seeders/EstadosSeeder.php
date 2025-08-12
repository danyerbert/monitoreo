<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Estado::create([
            'estado' => 'DISTRITO CAPITAL'
        ]);
        Estado::create([
            'estado' => 'AMAZONAS'
        ]);
        Estado::create([
            'estado' => 'ANZOATEGUI'
        ]);
        Estado::create([
            'estado' => 'APURE'
        ]);
        Estado::create([
            'estado' => 'ARAGUA'
        ]);
        Estado::create([
            'estado' => 'BARINAS'
        ]);
        Estado::create([
            'estado' => 'BOLIVAR'
        ]);
        Estado::create([
            'estado' => 'CARABOBO'
        ]);
        Estado::create([
            'estado' => 'COJEDES'
        ]);
        Estado::create([
            'estado' => 'DELTA AMACURO'
        ]);
        Estado::create([
            'estado' => 'FALCON'
        ]);
        Estado::create([
            'estado' => 'GUARICO'
        ]);
        Estado::create([
            'estado' => 'LARA'
        ]);
        Estado::create([
            'estado' => 'MERIDA'
        ]);
        Estado::create([
            'estado' => 'MIRANDA'
        ]);
        Estado::create([
            'estado' => 'MONAGAS'
        ]);
        Estado::create([
            'estado' => 'NUEVA ESPARTA'
        ]);
        Estado::create([
            'estado' => 'PORTUGUESA'
        ]);
        Estado::create([
            'estado' => 'SUCRE'
        ]);
        Estado::create([
            'estado' => 'TACHIRA'
        ]);
        Estado::create([
            'estado' => 'TRUJILLO'
        ]);
        Estado::create([
            'estado' => 'YARACUY'
        ]);
        Estado::create([
            'estado' => 'ZULIA'
        ]);
        Estado::create([
            'estado' => 'LA GUAIRA'
        ]);



    }
}
