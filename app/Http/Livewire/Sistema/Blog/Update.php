<?php

namespace App\Http\Livewire\Sistema\Blog;

use Exception;
use App\Models\Blog;

use App\Models\Menu;
use Livewire\Component;
use App\Models\BlogPostagem;
use App\Models\BlogCategoria;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Update extends Component
{
    use WithFileUploads;

    public $menuAtivo = "block";
    public $obj = [];
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

    public $cor_fundo_botao         = '#000000';
    public $cor_fonte_botao         = '#ffffff';

    /** Alternativa tecnica */
    public $postagens = [];

    /** postagem */
    public $telaPostagemOn = false;

    public $imagem = '';
    public $titulo = '';
    public $resumo = '';
    public $descricaoPost = '';
    public $blogs_categorias_id = '';

    /** Categoria */
    public $categoria = '';
    public $telaPostagemCategoriaOn = 0;

    protected $listeners = ['enviaEvento' => "hiddenForm"];

    public function mount(){

        $this->obj = Blog::first();
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
        $this->cor_fundo_botao          = $this->obj->cor_fundo_botao;
        $this->cor_fonte_botao          = $this->obj->cor_fonte_botao;



    }

    public function render()
    {
        $this->postagens = BlogPostagem::all();
        $blogs_categorias = BlogCategoria::where('ativo', 1)->get();
        return view('livewire.sistema.blog.update', ['blogs_categorias' => $blogs_categorias]);
    }

    public function hiddenForm($valor){
        $this->menuAtivo = $valor;
        //$this->menuAtivo = $this->menuAtivo == 'block' ? 'none' : 'block';
    }

    public function abrirPostagem(){
        $this->telaPostagemOn = 1;
    }

    public function fecharPostagem(){
        $this->telaPostagemOn = 0;
    }

    public function salvarPostagem(){

        $validator = Validator::make(
            [
                'titulo' => $this->titulo, 'resumo' => $this->resumo, 'descricaoPost' => $this->descricaoPost, 
                'imagem' => $this->imagem, 'blogs_categorias_id' => $this->blogs_categorias_id
            ],
            [
                'blogs_categorias_id' => 'required|min:1',
                'titulo' => 'required|string|min:2',
                'resumo' => 'required|string|min:2',
                'descricaoPost' => 'required|string|min:2',
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O campo :attribute deve ser uma string.',
                'min' => [
                    'string' => 'O campo :attribute não pode ter menos que :min caracteres.',
                ],
                'image' => 'O campo :attribute deve ser uma imagem válida.',
                'mimes' => 'O campo :attribute deve ter um dos seguintes formatos: :values.',
                'max' => 'O campo :attribute não pode ter mais de :max kilobytes.',
            ]
        );

        if ($validator->fails()) {
            $this->addError('titulo', $validator->errors()->first('titulo'));
            $this->addError('resumo', $validator->errors()->first('resumo'));
            $this->addError('descricaoPost', $validator->errors()->first('descricaoPost'));
            $this->addError('imagem', $validator->errors()->first('imagem'));
            $this->addError('blogs_categorias_id', $validator->errors()->first('blogs_categorias_id'));
            return;
        }

        if (File::exists("public/blog")) {
            File::chmod("public/blog", 0777);
        }

        $postagem = new BlogPostagem;
        $postagem->titulo = $this->titulo;
        $postagem->resumo = $this->resumo;
        $postagem->postagem = $this->descricaoPost;
        $postagem->imagem = $this->imagem->store("public/blog");
        $postagem->blogs_categorias_id = $this->blogs_categorias_id;
        $postagem->blogs_id = 1;
        $postagem->save();      
        
        $this->titulo = '';
        $this->resumo = '';
        $this->descricaoPost = '';
        $this->imagem = '';
        $this->blogs_categorias_id = '';

        $this->telaPostagemOn = 0;
    }

    public function abrirPostagemCategoria(){
        $this->telaPostagemCategoriaOn = 1;
    }

    public function fecharPostagemCategoria(){
        $this->telaPostagemCategoriaOn = 0;
    }

    public function deletarCategoria($id){
        $cat = BlogCategoria::find($id);
        $cat->delete();
    }
    

    public function salvarCategoria(){

        $validator = Validator::make(
            ['categoria' => $this->categoria],
            [
                'categoria' => 'required|string|min:2',
            ],
            [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O campo :attribute deve ser uma string.',
                'min' => [
                    'string' => 'O campo :attribute não pode ter menos que :min caracteres.',
                ],
            ]
        );

        if ($validator->fails()) {
            $this->addError('categoria', $validator->errors()->first('categoria'));
            return;
        }
        
        $postagem = new BlogCategoria;
        $postagem->categoria = $this->categoria;
        $postagem->save();      
        
        $this->categoria = '';

        $this->telaPostagemCategoriaOn = 0;
    }


    public function apagar($id){
        $BlogPostagem = BlogPostagem::find($id);
        $BlogPostagem->delete();
    }

    public function salvar(){

        //$this->validate();

        //try {
            DB::beginTransaction();

            if(!empty($this->obj->id)){

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
                $this->obj->cor_fundo_botao         = $this->cor_fundo_botao;
                $this->obj->cor_fonte_botao         = $this->cor_fonte_botao;
                $this->obj->save();
            }
            

            DB::commit();

            return redirect("/sistema/setup/blog/update");

        //} catch (\Exception $e) {
        //    DB::rollback();            
        //}
        
    }
}
