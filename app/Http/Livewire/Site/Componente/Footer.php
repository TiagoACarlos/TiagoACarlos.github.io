<?php

namespace App\Http\Livewire\Site\Componente;

use Livewire\Component;
use App\Models\ConfFooter;
use App\Models\RedeSocial;
use App\Models\Configuracao;
use App\Models\Menu as MenuSite;

use Illuminate\Support\Facades\Storage;


class Footer extends Component
{
    public function render()
    {
        $footer = ConfFooter::first();
        $menusRaiz = MenuSite::whereNull("menus_id")->orderBy("classificacao")->get();
        $redes = RedeSocial::all();
        $configuracao = Configuracao::first();

        return view('livewire.site.componente.footer', ['footer' => $footer, 'menusRaiz' => $menusRaiz, "redes" => $redes, "configuracao" => $configuracao ]);
    }
}
