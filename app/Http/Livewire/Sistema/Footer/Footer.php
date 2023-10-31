<?php

namespace App\Http\Livewire\Sistema\Footer;

use App\Models\ConfFooter;
use Livewire\Component;

class Footer extends Component
{
    public $menuAtivo = "block";

    public $cor_fundo = '#FFFFFF';
    public $cor_fonte = '#000000';
    public $tamanho_fonte = '1';
    public $tamanho_footer = '2';
    public $posicao_menu = '0';
    public $text_align = 'left';
    public $padding_top = 0;
    public $padding_x = 2;

    public $cor_fundo_vennx = '#FFFFFF';
    public $cor_fonte_vennx = '#000000';
    public $tamanho_fonte_vennx = '1';
    public $tamanho_footer_vennx = '1';
    public $padding_top_vennx = 0;

    public function mount(){
        $this->confMenu = ConfFooter::find(1);

        if(empty($this->confMenu->id))
            return;

        $this->cor_fundo        = $this->confMenu->cor_fundo;
        $this->cor_fonte        = $this->confMenu->cor_fonte;
        $this->tamanho_fonte    = $this->confMenu->tamanho_fonte;
        $this->tamanho_footer     = $this->confMenu->tamanho_footer;
        $this->text_align       = $this->confMenu->text_align;
        $this->padding_top      = $this->confMenu->padding_top;
        $this->padding_x        = $this->confMenu->padding_x;

        $this->cor_fundo_vennx        = $this->confMenu->cor_fundo_vennx;
        $this->cor_fonte_vennx       = $this->confMenu->cor_fonte_vennx;
        $this->tamanho_fonte_vennx    = $this->confMenu->tamanho_fonte_vennx;
        $this->tamanho_footer_vennx    = $this->confMenu->tamanho_footer_vennx;
        $this->padding_top_vennx        = $this->confMenu->padding_top_vennx;

    }

    public function render()
    {
        return view('livewire.sistema.footer.footer');
    }

    public function toogleMenu(){
        $this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }


    public function salvar(){

        $this->confMenu->cor_fundo          = $this->cor_fundo;
        $this->confMenu->cor_fonte          = $this->cor_fonte;
        $this->confMenu->tamanho_fonte      = $this->tamanho_fonte;
        $this->confMenu->tamanho_footer       = $this->tamanho_footer;
        $this->confMenu->text_align         = $this->text_align;
        $this->confMenu->padding_top        = $this->padding_top;
        $this->confMenu->padding_x          = $this->padding_x;

        $this->confMenu->cor_fundo_vennx          = $this->cor_fundo_vennx;
        $this->confMenu->cor_fonte_vennx          = $this->cor_fonte_vennx;
        $this->confMenu->tamanho_fonte_vennx      = $this->tamanho_fonte_vennx;
        $this->confMenu->tamanho_footer_vennx     = $this->tamanho_footer_vennx;
        $this->confMenu->padding_top_vennx        = $this->padding_top_vennx;

        $this->confMenu->save();

        return redirect("/sistema/setup/footer");
    }
}
