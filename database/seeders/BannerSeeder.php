<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner = Banner::create([
            'descricao' => 'Imagem Vennx - Banner',
            'imagem' => 'img/banner-02.png',
            'cor_fundo' => '#FFFFFF',
            'cor_fonte' => '#000000',
            'tamanho_fonte' => '2',
            'cadastrado_por' => 1,
        ]);
    }
}
