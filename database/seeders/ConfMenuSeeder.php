<?php

namespace Database\Seeders;

use App\Models\ConfMenu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = ConfMenu::create([
            'cadastrado_por' => 1,
        ]);
    }
}
