<?php

namespace App\Http\Livewire\Sistema\Pagina;

use Exception;
use App\Models\Menu;
use App\Models\Galeria;
use Livewire\Component;

use Livewire\WithFileUploads;

use Illuminate\Support\Facades\DB;
use App\Models\Pagina as SitePagina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Pagina extends Component
{
    use WithFileUploads;
    
    public $menuAtivo = "block";
    public $paginaEdit = [];
    public $paginaEditAtivo = 0;

    public $menus_id = 0;
    public $tem_banner = 0;
    public $conteudo = '';
    public $imagem = '';
    public $cor_fundo = '#FFFFFF';
    public $lado_imagem = 'left';
    public $tamanho_imagem = '1'; # 1 imagem pequena, 2 media, 3 grande    
    public $form_contato = '0';  
    public $padding_x = '0';
    public $padding_y = '0';
    public $galerias_id = '0';
    public $blog = '0';
    public $mostrar_blog_resumo = 0;
    
    /** paramentros */
    public $menu = "";
    public $pagina = 0;

    protected $rules = [
        'imagem' => 'nullable|mimes:png,jpg,jpeg|max:8192',
        'menus_id' => 'int|min:1',
    ];

    protected $messages = [
        'menus_id.min' => 'Escolha o menu.',
        'imagem.file' => 'Arquivo Inváido.',
        'imagem.max' => 'Arquivo não pode ter mais de 8MB.',
        'imagem.mimes' => 'Arquivo precisa ser no formato PDF, PNG ou JPG.',
    ];

    protected $listeners = ['enviaEvento' => "hiddenForm"];

    public function mount($menu = '', $pagina = ''){
        $this->menu = $menu;
        $this->pagina = $pagina;
    }

    public function render()
    {
        $menus = Menu::orderBy("classificacao")->get();
        #$paginas = SitePagina::where("menus_id", $this->menus_id)->get();
        $paginas = SitePagina::all();
        $galerias = Galeria::all();

        return view('livewire.sistema.pagina.pagina', ['menus' => $menus, 'paginas' => $paginas, 'galerias' => $galerias]);
    }

    public function hiddenForm($valor){
        $this->menuAtivo = $valor;
        //$this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function apagar($id){
        
        $obj = SitePagina::find($id);      
        $obj->delete();        

    }

    public function editar($id){

        $this->paginaEdit = SitePagina::find($id);

        $this->paginaEditAtivo = 1;

        $this->menus_id = $this->paginaEdit->menus_id;
        //!empty($this->imagem) ? $this->imagem->store("public/pagina/".$this->menus_id) : null;
        $this->cor_fundo = $this->paginaEdit->cor_fundo;
        $this->cor_fonte = $this->paginaEdit->cor_fonte;
        $this->conteudo = $this->paginaEdit->conteudo;
        $this->lado_imagem = $this->paginaEdit->lado_imagem;
        $this->tamanho_imagem = $this->paginaEdit->tamanho_imagem;
        $this->form_contato = $this->paginaEdit->form_contato;
        $this->galerias_id = $this->paginaEdit->galerias_id;
        $this->padding_x = $this->paginaEdit->padding_x;
        $this->padding_y = $this->paginaEdit->padding_y;
        $this->blog = $this->paginaEdit->blog;
        $this->mostrar_blog_resumo = $this->paginaEdit->mostrar_blog_resumo; 

    }

    public function update(){

        $this->paginaEditAtivo = 1;

        //!empty($this->imagem) ? $this->imagem->store("public/pagina/".$this->menus_id) : null;
        $this->paginaEdit->imagem = !empty($this->imagem) ? $this->imagem->store("public/pagina/".$this->menus_id) : $this->paginaEdit->imagem;
        $this->paginaEdit->cor_fundo = $this->cor_fundo;
        $this->paginaEdit->conteudo = $this->conteudo;
        $this->paginaEdit->lado_imagem = $this->lado_imagem;
        $this->paginaEdit->tamanho_imagem =  $this->tamanho_imagem;
        $this->paginaEdit->form_contato = $this->form_contato;
        $this->paginaEdit->galerias_id = $this->galerias_id;
        $this->paginaEdit->padding_x = $this->padding_x;
        $this->paginaEdit->padding_y = $this->padding_y;
        $this->paginaEdit->blog = $this->blog;
        $this->paginaEdit->mostrar_blog_resumo = $this->mostrar_blog_resumo;
        
        $this->paginaEdit->save();

        $this->menus_id = 0;
        $this->tem_banner = 0;
        $this->conteudo = '';
        $this->imagem = '';
        $this->cor_fundo = '#FFFFFF';
        $this->lado_imagem = 'left';
        $this->tamanho_imagem = '1'; # 1 imagem pequena, 2 media, 3 grande    
        $this->form_contato = '0';  
        $this->padding_x = '0';
        $this->padding_y = '0';
        $this->blog = '0';
        $this->mostrar_blog_resumo = 0;

        $this->paginaEditAtivo = 0;

    }

    public function fechaEdit(){

        $this->menus_id = 0;
        $this->tem_banner = 0;
        $this->conteudo = '';
        $this->imagem = '';
        $this->cor_fundo = '#FFFFFF';
        $this->lado_imagem = 'left';
        $this->tamanho_imagem = '1'; # 1 imagem pequena, 2 media, 3 grande    
        $this->form_contato = '0';  
        $this->padding_x = '0';
        $this->padding_y = '0';
        $this->blog = 0;
        $this->mostrar_blog_resumo = 0;

        $this->paginaEditAtivo = 0;

    }


    public function salvar(){

        $this->validate();

        //try {
            DB::beginTransaction();

            if (File::exists("public/pagina/".$this->menus_id)) {
                File::chmod("public/pagina/".$this->menus_id, 0777);
            }
            $pagina = new SitePagina;

            $pagina->menus_id               = $this->menus_id;
            $pagina->imagem                 = !empty($this->imagem) ? $this->imagem->store("public/pagina/".$this->menus_id) : null;
            $pagina->cor_fundo              = $this->cor_fundo;
            #$pagina->cor_fonte              = $this->cor_fonte;
            $pagina->conteudo               = $this->conteudo;
            $pagina->lado_imagem            = $this->lado_imagem;
            $pagina->tamanho_imagem         = $this->tamanho_imagem;
            $pagina->form_contato           = $this->form_contato;
            $pagina->galerias_id            = $this->galerias_id;
            $pagina->padding_x              = $this->padding_x;
            $pagina->padding_y              = $this->padding_y;
            $pagina->blog                   = $this->blog;
            $pagina->mostrar_blog_resumo    = $this->mostrar_blog_resumo;
            
            $pagina->cadastrado_por   = Auth::user()->id;     
            $pagina->save();

            DB::commit();

            return redirect("/sistema/setup/pagina");

        //} catch (\Exception $e) {
        //    DB::rollback();            
        //}
        
    }
}
