<div>
    <livewire:site.componente.menu />
    @if(!empty($menuAtivo->tem_banner))
    <livewire:site.componente.banner />
    @endif
    <livewire:site.componente.conteudo :menu="$menu" :id="$idAtivo" />
    <livewire:site.componente.footer />

    <livewire:site.componente.pop-up-cooker />

</div>
