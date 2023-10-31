<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin Vennx',
            'email' => 'admin@vennx.com.br',
            'password' => bcrypt('vennx#2021'),
            'cadastrado_por' => 1,
        ]);

        $user = User::create([
            'name' => 'Aily Torezani',
            'email' => 'aily.torezani@vennx.com.br',
            'password' => bcrypt('vennx#2021'),
            'cadastrado_por' => 1,
        ]);
    }
}
