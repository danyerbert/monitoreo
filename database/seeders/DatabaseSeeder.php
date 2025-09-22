<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(
            RolSeeder::class,
            User::class,
        );
        $this->call(EstadosSeeder::class);
        $this->call(PersonasSeeder::class);
        
        User::factory()->create([
            'name' => 'Jennifer',
            'email' => 'jennifer@mercal.gob.ve',
            'password' => bcrypt('123456'),
        ])->assignRole('Analista');
        
        User::factory()->create([
            'name' => 'Danyerbert Rangel',
            'email' => 'danyerbert@mercal.gob.ve',
            'password' => bcrypt('123456'),
        ])->assignRole('Administrador');
        
        User::factory()->create([
            'name' => 'Moises Ramos',
            'email' => 'moisesr@mercal.gob.ve',
            'password' => bcrypt('123456'),
        ])->assignRole('Analista');

        User::factory()->create([
            'name' => 'Maria Morao',
            'email' => 'mariamorao@mercal.gob.ve',
            'password' => bcrypt('123456'),
        ])->assignRole('Analista');
        
        User::factory()->create([
            'name' => 'Luis Ceballos',
            'email' => 'luisceballos@mercal.gob.ve',
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');
    }
}
