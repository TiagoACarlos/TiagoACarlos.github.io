<?php

namespace App\Http\Livewire\Site;

use App\Models\Menu;
use Livewire\Component;

class Home extends Component
{
    public $menu;
    public $menuAtivo;
    public $idAtivo = 0;
    public $categoria = 0;

    public function mount($menu = '', $id = 0){
        $this->menu = $menu;

        if(empty($menu))
            $this->menuAtivo = Menu::where("pagina_inicial", 1)->first();
        else
            $this->menuAtivo = Menu::whereRaw("REPLACE(LOWER(menu),' ', '-') = ?", $this->menu ?? '-')->first();

        $this->idAtivo = $id;

    }

    public function render()
    {
        return view('livewire.site.home');
    }
}
