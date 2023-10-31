<?php

namespace Database\Seeders;

use App\Models\Configuracao;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfiguracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cont = Configuracao::create([
            'titulo' => 'Vennx - Site',
            'texto_politicas' => '<h3 style="font-weight: bold;">ATUALIZAMOS NOSSA POLÍTICA DE COOKIES</h3>
            Este site utiliza cookies e outras tecnologias de rastreamento para melhorar sua experiência de navegação e personalizar conteúdo e anúncios. Ao continuar navegando, você concorda com o uso de cookies.
            Importante: A Vennx Cyber Suíte, responsável pelo desenvolvimento deste site, informa que não é responsável pelos serviços, produtos ou formas de atendimento fornecidos nesse site.
            Para mais informações, consulte nossa: '
        ]);
    }
}
