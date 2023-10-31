<div class="">
    <livewire:site.componente.menu />

    @if(!empty($menuAtivo->tem_banner))
    <livewire:site.componente.banner />
    @endif

    @if($rotaName == 'sistema.setup.contato')
    <livewire:site.componente.form-contato />
    @elseif($rotaName == 'sistema.setup.galeria')
    <livewire:site.componente.galeria :idGaleria="$pagina" />
    @elseif($rotaName == 'sistema.setup.blog.update')
    <livewire:site.componente.blog />
    @else
    <livewire:site.componente.conteudo :menu="$menu" />
    @endif

    <livewire:site.componente.footer />

    <livewire:site.componente.pop-up-cooker />
</div>