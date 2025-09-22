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
       
        User::factory()->create([
            'name' => 'danyerbert',
            'email' => 'danyerbert@mercal.gob.ve',
            'password' => bcrypt('123456'),
        ]);
    }
}
