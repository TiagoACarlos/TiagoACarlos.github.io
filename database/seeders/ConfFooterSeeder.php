<?php

namespace Database\Seeders;

use App\Models\ConfFooter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = ConfFooter::create([
            'cadastrado_por' => 1,
        ]);
    }
}
