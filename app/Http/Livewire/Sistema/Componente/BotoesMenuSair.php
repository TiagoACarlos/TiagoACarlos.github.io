<?php

namespace App\Http\Livewire\Sistema\Componente;

use Livewire\Component;

class BotoesMenuSair extends Component
{
    public $menu = "block";

    public function render()
    {
        return view('livewire.sistema.componente.botoes-menu-sair');
    }

    public function enviaEvento(){
        $this->menu = $this->menu == 'block' ? 'none' : 'block';
        $valor = $this->menu;
        $this->emit('enviaEvento', $valor);
    }
}
