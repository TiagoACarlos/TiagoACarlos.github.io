<?php

namespace App\Http\Livewire\Site\Componente;

use Livewire\Component;
use App\Models\Galeria as GaleriaFoto;
use App\Models\GaleriaImagem;

class Galeria extends Component
{

    public $galeria = [];
    public $imagemModal = [];

    public function mount($idGaleria = 0){
        $this->galeria = GaleriaFoto::find($idGaleria);
    }

    public function render()
    {
        $fotos = GaleriaImagem::where("galerias_id", $this->galeria->id ?? 0)->get();

        return view('livewire.site.componente.galeria', ["fotos" => $fotos]);
    }


    public function modalImagem($id){

        $this->imagemModal = GaleriaImagem::find($id);

    }

    public function fechaModalImagem(){

        $this->imagemModal = [];

    }
}
