<?php

namespace App\Http\Livewire\Sistema\Componente;

use Livewire\Component;

class Menu extends Component
{

    public $etapas = [ 
        ['rota' => 'sistema.setup.configuracao', 'nome' => 'Configurações'],
        ['rota' => 'sistema.setup.menu', 'nome' => 'Conf. Menus'],
        ['rota' => 'sistema.setup.footer', 'nome' => 'Conf. Rodapé'],
        ['rota' => 'sistema.setup.cadastro-menus', 'nome' => 'Cad. Menus'],
        ['rota' => 'sistema.setup.rede-social', 'nome' => 'Redes Sociais'],
        ['rota' => 'sistema.setup.banner', 'nome' => 'Banner'],
        ['rota' => 'sistema.setup.pagina', 'nome' => 'Pagina'],
        ['rota' => 'sistema.setup.contato', 'nome' => 'Form. de Contato'],
        ['rota' => 'sistema.setup.galeria', 'nome' => 'Cad. Galeria'],
        ['rota' => 'sistema.setup.blog.update', 'nome' => 'Blog'],
    ];
    
    public function render()
    {
        return view('livewire.sistema.componente.menu');
    }    
}
