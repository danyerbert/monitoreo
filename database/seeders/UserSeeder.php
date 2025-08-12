<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*User::create([
            'name' => 'Danyerbert Rangel',
            'email' => 'danyerbert@gmail.com',
            'password' =>Hash::make('123456'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'juliet Brito',
            'email' => 'ybrito@mercal.gob.ve',
            'password' => Hash::make('123456')
        ])->assignRole('Analista');
        
        User::factory(9)->created()*/;

        User::factory()->create([
            'name' => 'danyerbert',
            'email' => 'danyerbert@mercal.gob.ve',
            'password' => bcrypt('123456'),
        ]);
    }
}
