<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Menu::create([
            'menu' => "Home",
            'pagina_inicial' => "1",
            'tem_banner' => "1",
            'cadastrado_por' => 1,
        ]);
    }
}
