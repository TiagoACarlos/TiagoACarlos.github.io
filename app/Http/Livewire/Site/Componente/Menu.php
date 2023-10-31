<?php

namespace App\Http\Livewire\Site\Componente;

use App\Models\Menu as limpa;
use Livewire\Component;
use App\Models\ConfMenu;
use App\Models\Configuracao;
use App\Models\Menu as MenuSite;
use Illuminate\Support\Facades\Storage;

class Menu extends Component
{
    public $menuMobile = "none";

    public function render()
    {
        $menu = ConfMenu::first();
        $menusRaiz = MenuSite::whereNull("menus_id")->orderBy("classificacao")->get();
        $configuracao = Configuracao::first();

        return view('livewire.site.componente.menu', ['menu' => $menu, 'menusRaiz' => $menusRaiz, 'configuracao' => $configuracao ]);
    }

    public function toggleMenu(){
        $this->menuMobile = $this->menuMobile == "none" ? "block" : "none";
    }
   
}
