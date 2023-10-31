<?php

namespace App\Http\Livewire\Site\Componente;

use App\Models\Menu;
use Livewire\Component;
use App\Models\BlogPostagem;

use Livewire\WithPagination;
use App\Models\BlogCategoria;
use App\Models\Blog as BlogSite;

class Blog extends Component
{
    use WithPagination;
    public $fakeCategorias = ['Tecnologia', 'GRC', 'Segurança'];

    public $postagemCarregada = '';
    public $menu = '';
    public $postagem = [];
    public $postagemRelacionadas = [];

    protected $queryString = [
        'filtroCategoria' => ['except' => ''],
    ];


    /** Filtro categoria */
    public $filtroCategoria = '';

    public function mount($menu = '', $id = ''){

        if(!empty($id)){
            $postagens = BlogPostagem::where("id", $id)->first();
            if(!empty($postagens->id)){
                $this->postagemCarregada = $id;
                $this->postagem = $postagens;
                $this->postagemRelacionadas = BlogPostagem::where("blogs_categorias_id", $postagens->categoria->id)->where("id", '!=', $id)->limit(4)->get();
            }
        }

        $this->menu = $menu->menu ?? 'invalido';

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $blog = BlogSite::first();
        $categorias = BlogCategoria::where("ativo", 1)->get();
        //$postagens = BlogPostagem::paginate(3);
        $postagens = BlogPostagem::query();

        if (!empty($this->filtroCategoria)) {
            $postagens->where('blogs_categorias_id', $this->filtroCategoria);
        }
        
        return view('livewire.site.componente.blog', ['blog' => $blog, 'categorias' => $categorias, 'postagens' => $postagens->paginate(3) ]);
    }


    public function postagem($id){
        $postagens = BlogPostagem::where("id", $id)->first();
        if(!empty($postagens->id)){
            $this->postagemCarregada = $id;
            $this->postagem = $postagens;

            $this->postagemRelacionadas = BlogPostagem::where("blogs_categorias_id", $postagens->categoria->id)->where("id", '!=', $id)->limit(4)->get();
        }       

        //return redirect("/site/". Menu::limparURL($this->menu) . '/'.$this->postagemCarregada);

    }

    public function voltar(){
        //$this->postagemCarregada = 0;
        //return redirect()->back()->with('back', true);
        $this->postagemCarregada = 0;
    }

    public function filtrarCat($idCat){
        $this->filtroCategoria = $idCat;
        $this->updatingSearch();
        //return redirect("/". $this->menu . '/?categoria='.$idCat);

    }
}
