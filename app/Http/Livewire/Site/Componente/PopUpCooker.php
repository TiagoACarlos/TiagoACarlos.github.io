<?php

namespace App\Http\Livewire\Site\Componente;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Configuracao;

class PopUpCooker extends Component
{
    public function render()
    {
        //Session::put("CienteCookers", 0);
        $configuracao = Configuracao::first();
        return view('livewire.site.componente.pop-up-cooker', ['configuracao' => $configuracao]);
    }


    public function CienteCookers(){
        Session::put("CienteCookers", 1);
    }
}
