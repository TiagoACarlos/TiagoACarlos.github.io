<div class="" style="" style="display: {{ count($postagens) > 0 ? 'block' : 'none'; }}">
    <h3 class=" titulo-postagens-resumo text-2xl font-semibold mb-4" style="color: {{ $blog->cor_fonte_titulo }};">Últimas postagens: </h3>
    <div class="grid grid-cols-3 blog"  style=" gap: {{ $blog->gap ?? 0 }}rem; text-align: {{ $blog->lado_text ?? 'left'}}; ">
        @foreach($postagens as $item)
        <div class=" overflow-hidden grid grid-cols-1 gap-2" style="  padding: {{ $blog->padding ?? 0 }}; border-style: solid; border-width: {{ $blog->borda ?? 0 }}px; border-color: {{ $blog->cor_borda }}; border-radius: {{ $blog->border_radius }};">
            <a href="/site/{{ App\Models\Menu::limparURL($pagina->menu->menu ?? '#') ?? '#'}}/{{ $item->id }}">
                <img src="{{ Storage::url($item->imagem) }}" class=" max-w-full" alt="" style=" border-radius: {{ $blog->border_radius_imagem }}; border-style: solid; padding: {{ $blog->padding_imagem }}; border-width: {{ $blog->borda_imagem }}px; border-color: {{ $blog->cor_borda_imagem }}">
            </a>
            <div class="">
                @if(!empty($blog->mostrar_texto))
                <a href="/site/{{ App\Models\Menu::limparURL($pagina->menu->menu ?? '#') ?? '#'}}/{{ $item->id }}">
                    <h3 class=" font-semibold text-sm" style=" color: {{ $blog->cor_fonte_titulo }}; ">
                        {{ $item->titulo }} <span class=" text-xs block opacity-80 mb-2">Postagem em: {{ date_format($item->created_at,"d/m/Y H:i    ") }} - {{ $item->categoria->categoria }}</span> 
                    </h3>
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <style>
        @media only screen and (max-width: 768px) {
            .blog {
                grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
            }
        }
    </style>
    
</div>
