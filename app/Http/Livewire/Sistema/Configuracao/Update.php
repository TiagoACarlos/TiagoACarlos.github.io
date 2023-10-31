<?php

namespace App\Http\Livewire\Sistema\Configuracao;

use Exception;

use App\Models\Configuracao;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Update extends Component
{
    use WithFileUploads;

    public $menuAtivo = "block";
    public $obj = [];
    public $titulo = '';
    public $icone = '';
    public $logo_menu = '';
    public $logo_footer = '';
    public $texto_politicas = '';
    public $arquivo_politicas = '';
    
    protected $listeners = ['enviaEvento' => "hiddenForm"];

    public function mount(){

        $this->obj = Configuracao::first();
        $this->titulo               = $this->obj->titulo;
        //$this->icone                = $this->obj->icone;
        //$this->logo_menu            = $this->obj->logo_menu;
        //$this->logo_footer          = $this->obj->logo_footer;
        $this->texto_politicas      = $this->obj->texto_politicas;
        //$this->arquivo_politicas    = $this->obj->arquivo_politicas;

    }

    public function render()
    {
        return view('livewire.sistema.configuracao.update');
    }

    public function hiddenForm($valor){
        $this->menuAtivo = $valor;
        //$this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function salvar(){

        //$this->validate();

        //try {
            DB::beginTransaction();


            if (File::exists("public/icone")) {
                File::chmod("public/icone", 0777);
            }

            if (File::exists("public/logos/menu")) {
                File::chmod("public/logos/menu", 0777);
            }

            if (File::exists("public/logos/footer")) {
                File::chmod("public/logos/footer", 0777);
            }

            if (File::exists("public/politicas")) {
                File::chmod("public/politicas", 0777);
            }

            $this->obj->titulo = $this->titulo;
            $this->obj->icone = empty($this->icone) ? $this->obj->icone ?? null : $this->icone->store("public/icone");
            $this->obj->logo_menu = empty($this->logo_menu) ? $this->obj->logo_menu ?? null : $this->logo_menu->store("public/logos/menu");
            $this->obj->logo_footer = empty($this->logo_footer) ? $this->obj->logo_footer ?? null : $this->logo_footer->store("public/logos/footer");
            $this->obj->texto_politicas = $this->texto_politicas;
            $this->obj->arquivo_politicas = empty($this->arquivo_politicas) ? $this->obj->arquivo_politicas ?? null : $this->arquivo_politicas->store("public/politicas");
            $this->obj->save();

            DB::commit();

            return redirect("/sistema/setup/configuracao");

        //} catch (\Exception $e) {
        //    DB::rollback();            
        //}
        
    }
}
