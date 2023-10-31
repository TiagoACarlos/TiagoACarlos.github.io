<div class=" w-auto">
    <div class=" grid lg:grid-cols-3 pb-8" style=" min-height: {{ $footer->tamanho_footer }}rem; background: {{ $footer->cor_fundo }}; display:none">
        <div class=" w-full">
            <img src="{{ !empty($configuracao->logo_footer) ? Storage::url($configuracao->logo_footer) : asset('img/Logo_Vennx.png') }}" class=" lg:mx-auto" style="padding: {{  $footer->padding_top }}rem; height: {{ $footer->tamanho_footer / 2}}rem;">
        </div>
        <div class="">
            <ul class=" flex flex-wrap">
                @foreach ($menusRaiz as $item)
                    
                <li class=" block"><a href="{{ count($item->menusFilhos) > 0 ? "javascript:void(0)" : "/site/". App\Models\Menu::limparURL($item->menu) }}" class=" inline-block font-semibold" style=" font-size: {{ $footer->tamanho_fonte }}rem;
                    color: {{ $footer->cor_fonte }}; text-align: {{ $footer->text_align }}; padding: 0 {{ $footer->padding_x }}rem; padding-top: {{  $footer->padding_top }}rem;">{{ $item->menu}}</a>
                
                    @if(count($item->menusFilhos) > 0)
                        <ul  class=" ml-12">
                        @foreach ($item->menusFilhos as $sub)                            
                        <li class=" block">
                            <a href="/site/{{ App\Models\Menu::limparURL($sub->menu) }}" class=" inline-block font-semibold text-right" style=" font-size: {{ $footer->tamanho_fonte - .2 }}rem;
                            color: {{ $footer->cor_fonte }};"> - {{ $sub->menu}}</a></li>                       
                       @endforeach
                        </ul>                    
                    @endif
                </li>
                @endforeach    
            </ul>       
    
        </div>
        <div class=""  style=" font-size: {{ $footer->tamanho_fonte * 2 }}rem; padding: {{  $footer->padding_top }}rem;">
            @foreach ($redes as $item)
            <a href="{{ $item->link }}" target="_black" class=" inline-block p-2" style=" color: {{ $item->cor_texto }};">{!! $item->icone !!}</a>
            @endforeach
        </div>
    </div>    
    <div class=" lg:col-span-4 grid lg:grid-cols-2 text-center font-semibold" style=" min-height: {{ $footer->tamanho_footer_vennx }}rem; background: {{ $footer->cor_fundo_vennx }}; 
                                                                                font-size: {{ $footer->tamanho_fonte_vennx }}rem;  color: {{ $footer->cor_fonte_vennx }};
                                                                                padding-top: {{ $footer->padding_top_vennx}}rem;">
        <div>
            © Todos os direitos reservados - Vennx Tecnologia {{ date('Y') }}.
        </div>
        <div>
            <a href="https://cybersuite.com.br" title="CyberSuite" target="_blank">
                Site mantido por 
                <img src="{{ asset('img/cyberlogo.png') }}" class=" mx-auto inline-block ml-2 p-1 bg-white rounded-md" style=" height: {{ (float)$footer->tamanho_footer_vennx / 2 }}rem;">
            </a>
        </div>
    </div>   
</div>
