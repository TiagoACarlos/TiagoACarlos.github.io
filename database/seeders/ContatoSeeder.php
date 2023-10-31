<?php

namespace Database\Seeders;

use App\Models\Contato;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = Contato::create([
            'conteudo' => 'Formulário de contato.',            
            'cadastrado_por' => 1,
        ]);
    }
}
