<?php

namespace App\Http\Livewire\Sistema\RedeSocial;

use Livewire\Component;
use App\Models\RedeSocial;
use Illuminate\Support\Facades\Auth;

class Cadastro extends Component
{
    public $menuAtivo = "block";

    public $descricao = '';
    public $icone = '';
    public $link = '';
    public $cor_texto = '#000000';
    public $cor_fundo = '#ffffff';

    public function render()
    {
        $redes = RedeSocial::all();
        return view('livewire.sistema.rede-social.cadastro', ['redes' => $redes]);
    }

    public function toogleMenu(){
        $this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function apagar($id){
        
        $obj = RedeSocial::find($id);      
        $obj->delete();        

    }

    public function salvar(){
        
        $obj = new RedeSocial;
        $obj->descricao         = $this->descricao;
        $obj->link              = $this->link;
        $obj->icone             = $this->icone;
        $obj->cor_texto         = $this->cor_texto;
        $obj->cor_fundo         = $this->cor_fundo;
        $obj->cadastrado_por    = Auth::user()->id;        
        $obj->save();
        
        $this->descricao = "";
        $this->link = "";
        $this->icone = "";
        $this->cor_texto = "#000000";
        $this->cor_fundo = "#ffffff";
        
    }
    
}
