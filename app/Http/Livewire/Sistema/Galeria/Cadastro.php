<?php

namespace App\Http\Livewire\Sistema\Galeria;

use Exception;
use App\Models\Menu;

use App\Models\Galeria;
use App\Models\GaleriaImagem;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Pagina as SitePagina;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Cadastro extends Component
{
    use WithFileUploads;

    public $menuAtivo = "block";
    public $obj = [];
    public $galeria                 = '';
    public $descricao               = '';
    public $padding                 = '0px 0px 0px 0px';
    public $cor_fundo               = '#ffffff';
    public $cor_fonte_titulo        = '#000000';
    public $cor_fonte_texto         = '#000000';
    public $tamanho_fonte_titulo    = '1';
    public $tamanho_fonte_texto     = '1';
    public $grid                    = '4';
    public $gap                     = '2';
    public $mostrar_texto           = '1';

    public $borda                   = '0';
    public $cor_borda               = 'none';
    public $border_radius           = '0% 0% 0% 0%';

    public $borda_imagem            = '0';
    public $cor_borda_imagem        = 'none';
    public $padding_imagem          = '0px 0px 0px 0px';
    public $border_radius_imagem    = '0% 0% 0% 0%'; 
    public $lado_text               = 'left';

    /** Alternativa tecnica */
    public $galerias = [];

    /** upload Imagens */
    public $uploadOn = false;
    public $idGaleria = 0;
    public $fotos = [];

    public $imagem = '';
    public $titulo = '';
    public $descricaoFoto = '';

    protected $listeners = ['enviaEvento' => "hiddenForm"];

    public function mount($id = ''){
        $this->menu = '';
        $this->pagina = $id ?? '';

        if(empty($this->pagina))
            return;

        $this->obj = Galeria::find($this->pagina);
        $this->galeria                  = $this->obj->galeria;
        $this->descricao                = $this->obj->descricao;
        $this->padding                  = $this->obj->padding;
        $this->cor_fundo                = $this->obj->cor_fundo;
        $this->cor_fonte_titulo         = $this->obj->cor_fonte_titulo;
        $this->cor_fonte_texto          = $this->obj->cor_fonte_texto;
        $this->tamanho_fonte_titulo     = $this->obj->tamanho_fonte_titulo;
        $this->tamanho_fonte_texto      = $this->obj->tamanho_fonte_texto;
        $this->grid                     = $this->obj->grid;
        $this->mostrar_texto            = $this->obj->mostrar_texto;
        $this->gap                      = $this->obj->gap;
        $this->borda                    = $this->obj->borda;
        $this->cor_borda                = $this->obj->cor_borda;
        $this->border_radius            = $this->obj->border_radius;
        $this->borda_imagem             = $this->obj->borda_imagem;
        $this->cor_borda_imagem         = $this->obj->cor_borda_imagem;
        $this->padding_imagem           = $this->obj->padding_imagem;
        $this->border_radius_imagem     = $this->obj->border_radius_imagem;
        $this->lado_text                = $this->obj->lado_text;

    }

    public function render()
    {
        $this->galerias = Galeria::all();
        return view('livewire.sistema.galeria.cadastro');
    }

    public function hiddenForm($valor){
        $this->menuAtivo = $valor;
        //$this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function apagar($id){
        
        $menu = Galeria::find($id);      
        $menu->delete();        

    }

    public function OpenUploadImagem($idGaleria){
        $this->uploadOn = true;
        $this->idGaleria = $idGaleria;

        $this->fotos = GaleriaImagem::where("galerias_id", $idGaleria)->get();
    }

    public function CloseUploadImagem(){
        $this->uploadOn = false;
        $this->idGaleria = 0;
    }

    public function DeleteFoto($idFoto){
       
        $foto = GaleriaImagem::find($idFoto);
        $foto->delete();
        $this->fotos = GaleriaImagem::where("galerias_id", $this->idGaleria)->get();

    }

    public function upload(){
        
        if(empty($this->imagem))
        return;

        if (File::exists("public/galeria/".$this->idGaleria)) {
            File::chmod("public/galeria/".$this->idGaleria, 0777);
        }

        $foto = new GaleriaImagem;
        $foto->imagem = $this->imagem->store("public/galeria".$this->idGaleria);
        $foto->titulo = $this->titulo;
        $foto->descricao = $this->descricaoFoto;
        $foto->galerias_id = $this->idGaleria;
        $foto->cadastrado_por = Auth::user()->id; 
        $foto->save();

        $this->fotos = GaleriaImagem::where("galerias_id", $this->idGaleria)->get();

        
    }

    public function salvar(){

        //$this->validate();

        //try {
            DB::beginTransaction();

            if(empty($this->obj)){
                
                $this->obj = new Galeria;

                $this->obj->galeria                 = $this->galeria;
                $this->obj->descricao               = $this->descricao;
                $this->obj->padding                 = $this->padding;
                $this->obj->cor_fundo               = $this->cor_fundo;
                $this->obj->cor_fonte_titulo        = $this->cor_fonte_titulo;
                $this->obj->cor_fonte_texto         = $this->cor_fonte_texto;
                $this->obj->tamanho_fonte_titulo    = $this->tamanho_fonte_titulo;
                $this->obj->tamanho_fonte_texto     = $this->tamanho_fonte_texto;
                $this->obj->borda                   = $this->borda;
                $this->obj->gap                     = $this->gap;
                $this->obj->mostrar_texto           = $this->mostrar_texto;
                $this->obj->grid                    = $this->grid;
                $this->obj->cor_borda               = $this->cor_borda;
                $this->obj->border_radius           = $this->border_radius;
                $this->obj->borda_imagem            = $this->borda_imagem;
                $this->obj->cor_borda_imagem        = $this->cor_borda_imagem;
                $this->obj->padding_imagem          = $this->padding_imagem;
                $this->obj->border_radius_imagem    = $this->border_radius_imagem;
                $this->obj->lado_text               = $this->lado_text;
                $this->obj->cadastrado_por          = Auth::user()->id;        
                $this->obj->save();

            }else{

                $this->obj->galeria                 = $this->galeria;
                $this->obj->descricao               = $this->descricao;
                $this->obj->padding                 = $this->padding;
                $this->obj->cor_fundo               = $this->cor_fundo;
                $this->obj->cor_fonte_titulo        = $this->cor_fonte_titulo;
                $this->obj->cor_fonte_texto         = $this->cor_fonte_texto;
                $this->obj->tamanho_fonte_titulo    = $this->tamanho_fonte_titulo;
                $this->obj->tamanho_fonte_texto     = $this->tamanho_fonte_texto;
                $this->obj->borda                   = $this->borda;
                $this->obj->gap                     = $this->gap;
                $this->obj->mostrar_texto           = $this->mostrar_texto;
                $this->obj->grid                    = $this->grid;
                $this->obj->cor_borda               = $this->cor_borda;
                $this->obj->border_radius           = $this->border_radius;
                $this->obj->borda_imagem            = $this->borda_imagem;
                $this->obj->cor_borda_imagem        = $this->cor_borda_imagem;
                $this->obj->padding_imagem          = $this->padding_imagem;
                $this->obj->border_radius_imagem    = $this->border_radius_imagem;
                $this->obj->lado_text               = $this->lado_text;
                $this->obj->save();
            }
            

            DB::commit();

            return redirect("/sistema/setup/galeria/".$this->obj->id);

        //} catch (\Exception $e) {
        //    DB::rollback();            
        //}
        
    }
}
