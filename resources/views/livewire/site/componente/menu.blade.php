<div class=" w-auto grid grid-cols-4 z-10 relative" style=" height: {{ $menu->tamanho_menu }}rem; background: {{ $menu->cor_fundo }};">
    
    <div class=" w-full col-span-2 lg:col-span-1">
        <a href="/site">
            <img src="{{ !empty($configuracao->logo_menu) ? Storage::url($configuracao->logo_menu) : asset('img/Logo_Vennx.png') }}" class=" lg:mx-auto" style="padding: {{  (float)$menu->padding_top - 0.5 }}rem; height: {{ $menu->tamanho_menu }}rem;">
        </a>
    </div>
    <div class=" col-span-2 lg:hidden text-right" style="color: {{ $menu->cor_fonte }};">
        <button wire:click="toggleMenu()" class=" px-10 py-4 text-2xl"><i class="fa-solid fa-bars"></i></button>
    </div>
    <div class=" col-span-4 lg:col-span-3 lg:hidden" style=" background: {{ $menu->cor_fundo }};">
        <ul class="" style="display: {{ $menuMobile }}; ">
            @foreach ($menusRaiz as $item)                             
                @if(!empty($item->url))

                    <li class=" border-b lg:border-0 lg:inline-block">
                        <a target="_blank" href="{{$item->url}}" class=" inline-block font-semibold w-full" style=" height: {{ $menu->tamanho_menu }}rem; font-size: {{ $menu->tamanho_fonte }}rem;
                        color: {{ $menu->cor_fonte }}; text-align: {{ $menu->text_align }}; padding: 0 {{ $menu->padding_x }}rem; padding-top: {{  $menu->padding_top }}rem;">{{ $item->menu }}</a>

                    </li>
                    @continue
                    @endif
                    <li class=" border-b lg:border-0 lg:inline-block">
                        <a href="{{ count($item->menusFilhos) > 0 ? "javascript:void(0)" : "/site/". App\Models\Menu::limparURL($item->menu) }}" class=" inline-block font-semibold w-full" style=" height: {{ $menu->tamanho_menu }}rem; font-size: {{ $menu->tamanho_fonte }}rem;
                        color: {{ $menu->cor_fonte }}; text-align: {{ $menu->text_align }}; padding: 0 {{ $menu->padding_x }}rem; padding-top: {{  $menu->padding_top }}rem;">{{ $item->menu }}</a>
            
                
                        
               @if(count($item->menusFilhos) > 0)
                    <ul  class=" ml-12 pb-4">
                    @foreach ($item->menusFilhos as $sub)                            
                    <li class=" block">
                        <a href="/site/{{ App\Models\Menu::limparURL($sub->menu) }}" class="block font-semibold text-left py-2" style=" font-size: {{ $menu->tamanho_fonte - .2 }}rem;
                        color: {{ $menu->cor_fonte }};">{{ $sub->menu}}</a></li>                       
                    @endforeach
                    </ul>                    
                @endif
                    
            </li>
            @endforeach

        </ul>
    </div>

    <div class=" col-span-4 lg:col-span-3  hidden lg:block" style=" background: {{ $menu->cor_fundo }};">

        <ul class="menu">
            @foreach ($menusRaiz as $item)                

                @if(!empty($item->url))

                <li class=" border-b lg:border-0 lg:inline-block">
                    <a target="_blank" href="{{$item->url}}" class=" inline-block font-semibold w-full" style=" height: {{ $menu->tamanho_menu }}rem; font-size: {{ $menu->tamanho_fonte }}rem;
                    color: {{ $menu->cor_fonte }}; text-align: {{ $menu->text_align }}; padding: 0 {{ $menu->padding_x }}rem; padding-top: {{  $menu->padding_top }}rem;">{{ $item->menu }}</a>

                </li>
                @continue
                @endif


             
            

            
            
            
            <li class=" border-b lg:border-0 lg:inline-block">
                <a href="{{ count($item->menusFilhos) > 0 ? "javascript:void(0)" : "/site/". App\Models\Menu::limparURL($item->menu) }}" class=" inline-block font-semibold w-full" style=" height: {{ $menu->tamanho_menu }}rem; font-size: {{ $menu->tamanho_fonte }}rem;
                color: {{ $menu->cor_fonte }}; text-align: {{ $menu->text_align }}; padding: 0 {{ $menu->padding_x }}rem; padding-top: {{  $menu->padding_top }}rem;">{{ $item->menu }}</a>
                @if(count($item->menusFilhos) > 0)
                    <ul  class=" absolute rounded-b-lg" style=" background: {{ $menu->cor_fundo }}; padding: 0 {{ $menu->padding_x }}rem;">
                    @foreach ($item->menusFilhos as $sub)                            
                    <li class=" block px-2 py-1 w-full text-left">
                        <a href="/site/{{ App\Models\Menu::limparURL($sub->menu) }}" class=" inline-block font-semibold text-right" style=" font-size: {{ $menu->tamanho_fonte - .2 }}rem;
                        color: {{ $menu->cor_fonte }};">{{ $sub->menu}}</a></li>                       
                    @endforeach
                    </ul>                    
                @endif
            
            </li>
            @endforeach

        </ul>

    </div>

    <style>

        .menu li  ul{
            display:none;
        }

        .menu li:hover ul, .menu li.over ul{display:block;}


    </style>
</div>
