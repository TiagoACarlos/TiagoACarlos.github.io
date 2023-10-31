<?php

namespace App\Http\Livewire\Sistema\Contato;

use Exception;
use App\Models\Menu;

use App\Models\Contato;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Pagina as SitePagina;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FormContato extends Component
{
    public $menuAtivo = "block";
    public $obj = [];
    public $conteudo = '';
    public $cor_fundo = '#FFFFFF';
    public $cor_fonte = '#000000';
    public $tamanho_fonte = '1';
    public $padding_x = '0';
    public $padding_y = '0';
    public $altura_input = '14';
    public $tem_redes_socias = '0';    
    public $lado_text = 'left';
    public $email_destino = 'tecnologia@vennx.com.br';

    protected $listeners = ['enviaEvento' => "hiddenForm"];

    public function mount($menu = '', $pagina = ''){
        $this->menu = $menu;
        $this->pagina = $pagina;

        $this->obj = Contato::first();
        $this->conteudo         = $this->obj->conteudo;
        $this->cor_fundo        = $this->obj->cor_fundo;
        $this->cor_fonte        = $this->obj->cor_fonte;
        $this->tamanho_fonte    = $this->obj->tamanho_fonte;
        $this->padding_x        = $this->obj->padding_x;
        $this->padding_y        = $this->obj->padding_y;
        $this->altura_input     = $this->obj->altura_input;
        $this->tem_redes_socias = $this->obj->tem_redes_socias;
        $this->lado_text        = $this->obj->lado_text;
        $this->email_destino    = $this->obj->email_destino;


    }

    public function render()
    {
        $menus = Menu::orderBy("classificacao")->get();
        #$paginas = SitePagina::where("menus_id", $this->menus_id)->get();
        $paginas = SitePagina::all();

        return view('livewire.sistema.contato.form-contato', ['menus' => $menus, 'paginas' => $paginas]);
    }


    public function hiddenForm($valor){
        $this->menuAtivo = $valor;
        //$this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function salvar(){

        //$this->validate();

        //try {
            DB::beginTransaction();

            $this->obj->conteudo = $this->conteudo;
            $this->obj->cor_fundo = $this->cor_fundo;
            $this->obj->cor_fonte = $this->cor_fonte;
            $this->obj->tamanho_fonte = $this->tamanho_fonte;
            $this->obj->padding_x = $this->padding_x;
            $this->obj->padding_y = $this->padding_y;
            $this->obj->altura_input = $this->altura_input;
            $this->obj->tem_redes_socias = $this->tem_redes_socias;
            $this->obj->lado_text = $this->lado_text;
            $this->obj->email_destino = $this->email_destino;
            $this->obj->save();

            $pagina = new SitePagina;

            

            DB::commit();

            return redirect("/sistema/setup/contato");

        //} catch (\Exception $e) {
        //    DB::rollback();            
        //}
        
    }
}
