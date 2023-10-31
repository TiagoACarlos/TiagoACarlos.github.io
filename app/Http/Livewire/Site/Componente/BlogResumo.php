<?php

namespace App\Http\Livewire\Site\Componente;

use App\Models\Blog;
use App\Models\Menu;
use App\Models\Pagina;
use Livewire\Component;
use App\Models\BlogPostagem;

class BlogResumo extends Component
{
    public function render()
    {
        $postagens = BlogPostagem::orderBy("created_at", "desc")->limit(3)->get();
        $blog = Blog::first();
        $pagina = Pagina::where("blog", 1)->first();

        return view('livewire.site.componente.blog-resumo', ['postagens' => $postagens, 'blog' => $blog, "pagina" => $pagina]);
    }


    public function postagem($id){
        $postagens = BlogPostagem::where("id", $id)->first();

        $pagina = Pagina::where("blog", 1)->first();
        if(!empty($postagens->id) && !empty($pagina->id)){
            return redirect("/". Menu::limparURL($pagina->menu->menu) . '/'.$id);
        }       


    }
}
