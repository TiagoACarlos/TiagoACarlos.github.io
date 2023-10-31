<?php

namespace App\Http\Livewire\Sistema\Banner;

use App\Models\Banner as SiteBanner;

use Livewire\Component;
use Exception;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Banner extends Component
{
    use WithFileUploads;
    
    public $menuAtivo = "block";
    public $banner;

    public $descricao = '';
    public $imagem = '';
    public $cor_fonte = '#000000';
    public $cor_fundo = '#FFFFFF';
    public $tamanho_fonte = '2';
    public $altura = '30';
    
    protected $rules = [
        'imagem' => 'required|mimes:png,jpg,jpeg|max:8192',
    ];

    protected $messages = [
        'imagem.required' => 'Arquivo é obrigatório.',
        'imagem.file' => 'Arquivo Inváido.',
        'imagem.max' => 'Arquivo não pode ter mais de 8MB.',
        'imagem.mimes' => 'Arquivo precisa ser no formato PDF, PNG ou JPG.',
    ];

    public function mount(){
        $this->banner = SiteBanner::find(1);

        if(empty($this->banner->id))
            return;

        $this->descricao     = $this->banner->descricao;
        $this->imagem        = $this->banner->imagem;
        $this->cor_fundo     = $this->banner->cor_fundo;
        $this->cor_fonte     = $this->banner->cor_fonte;
        $this->tamanho_fonte = $this->banner->tamanho_fonte;
        $this->altura        = $this->banner->altura;

    }

    public function render()
    {
        return view('livewire.sistema.banner.banner');
    }

    public function toogleMenu(){
        $this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function salvar(){

        $this->validate();

        try {
            DB::beginTransaction();

            if (File::exists("public/banner")) {
                File::chmod("public/banner", 0777);
            }

            $tempImagem = $this->banner->imagem;

            $this->banner->descricao      = $this->descricao;
            $this->banner->imagem         = $this->imagem->store("public/banner");
            $this->banner->cor_fundo      = $this->cor_fundo;
            $this->banner->cor_fonte      = $this->cor_fonte;
            $this->banner->tamanho_fonte  = $this->tamanho_fonte;
            $this->banner->altura         = $this->altura;

            $this->banner->save();

            if($tempImagem != "img/banner-02.png")
                Storage::delete($tempImagem);

            DB::commit();

            return redirect("/sistema/setup/banner");

        } catch (\Exception $e) {
            DB::rollback();            
        }
        
    }
}
