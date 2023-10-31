<?php

namespace App\Http\Livewire\Sistema\Menu;

use Livewire\Component;
use App\Models\ConfMenu;

class Home extends Component
{

    public $menuAtivo = "block";

    public $cor_fundo = '#FFFFFF';
    public $cor_fonte = '#000000';
    public $tamanho_fonte = '1';
    public $tamanho_menu = '2';
    public $posicao_menu = '0';
    public $text_align = 'left';
    public $padding_top = 0;
    public $padding_x = 2;

    public function mount(){
        $this->confMenu = ConfMenu::find(1);

        if(empty($this->confMenu->id))
            return;

        $this->cor_fundo        = $this->confMenu->cor_fundo;
        $this->cor_fonte        = $this->confMenu->cor_fonte;
        $this->tamanho_fonte    = $this->confMenu->tamanho_fonte;
        $this->tamanho_menu     = $this->confMenu->tamanho_menu;
        $this->posicao_menu     = $this->confMenu->posicao_menu;
        $this->text_align       = $this->confMenu->text_align;
        $this->padding_top      = $this->confMenu->padding_top;
        $this->padding_x        = $this->confMenu->padding_x;
    }
    
    public function render()
    {
        return view('livewire.sistema.menu.home');
    }

    public function toogleMenu(){
        $this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }


    public function salvar(){

        $this->confMenu->cor_fundo          = $this->cor_fundo;
        $this->confMenu->cor_fonte          = $this->cor_fonte;
        $this->confMenu->tamanho_fonte      = $this->tamanho_fonte;
        $this->confMenu->tamanho_menu       = $this->tamanho_menu;
        $this->confMenu->posicao_menu       = $this->posicao_menu;
        $this->confMenu->text_align         = $this->text_align;
        $this->confMenu->padding_top        = $this->padding_top;
        $this->confMenu->padding_x          = $this->padding_x;

        $this->confMenu->save();

        return redirect("/sistema/setup/menu");
    }

}
