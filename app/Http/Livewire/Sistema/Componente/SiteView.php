<?php

namespace App\Http\Livewire\Sistema\Componente;

use Illuminate\Support\Facades\Route;

use App\Models\Menu;
use Livewire\Component;

class SiteView extends Component
{
    /** paramentros */
    public $menu = "";
    public $pagina = 0;
    public $menuAtivo;

    public $rotaName = '';

    public function mount($menu = '', $pagina = ''){
        $this->menu = $menu;
        $this->pagina = $pagina;

        if(empty($menu))
            $this->menuAtivo = Menu::where("pagina_inicial", 1)->first();
        else
            $this->menuAtivo = Menu::where("menu", trim($menu) ?? '-')->first();

        $this->rotaName = Route::currentRouteName();
        
    }

    public function render()
    {
        return view('livewire.sistema.componente.site-view');
    }
}
