<?php

namespace App\Http\Livewire\Site\Componente;

use App\Models\Menu;
use App\Models\Pagina;
use Livewire\Component;

class Conteudo extends Component
{
    public $menuAtivo;
    public $idAtivo = 0;

    public function mount($menu = '', $id = 0){
        if(empty($menu))
            $this->menuAtivo = Menu::where("pagina_inicial", 1)->first();
        else
            $this->menuAtivo = Menu::whereRaw("REPLACE(LOWER(menu),' ', '-') = ?", $menu ?? '-')->first();

        $this->idAtivo = $id;

    }

    public function render()
    {
        $paginas = Pagina::where("menus_id",  $this->menuAtivo->id ?? 0)->get();;
        return view('livewire.site.componente.conteudo', ['paginas' => $paginas]);
    }
}
