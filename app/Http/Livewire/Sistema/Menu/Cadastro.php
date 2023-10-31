<?php

namespace App\Http\Livewire\Sistema\Menu;

use App\Models\Menu;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cadastro extends Component
{
    public $menuAtivo = "block";

    /**campos */
    public $menu = '';
    public $menus_id = 0;
    public $classificacao = 0;
    public $pagina_inicial = 0;
    public $tem_banner = 0;
    public $link_externo = 0;
    public $url = "";

    public function render()
    {
        $menusRaiz = Menu::whereNull("menus_id")->orderBy("classificacao")->get();
        $menus = Menu::orderBy("classificacao")->get();

        return view('livewire.sistema.menu.cadastro', ['menusRaiz' => $menusRaiz, 'menus' => $menus]);
    }

    public function toogleMenu(){
        $this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function apagar($id){
        
        $menu = menu::find($id);      
        $menu->delete();        

    }

    public function salvar(){
        
        $menu = new menu;
        $menu->menu             = $this->menu;
        $menu->menus_id         = empty($this->menus_id) ? null : $this->menus_id;
        $menu->classificacao    = $this->classificacao;
        $menu->pagina_inicial   = $this->pagina_inicial;
        $menu->tem_banner       = $this->tem_banner;
        $menu->cadastrado_por   = Auth::user()->id;  
        $menu->link_externo     = $this->link_externo;
        $menu->url              = $this->url;      
        $menu->save();
        
        $this->menu = '';
        $this->classificacao = 0;
        
    }
    

}
