<div class=" w-auto" style="">

    @foreach ($paginas as $item)

        @if(!empty($item->conteudo))
            @if(strtolower($item->lado_imagem ?? '') == 'top')
                <div class="relative grid conteudo"  style=" background: {{ $item->cor_fundo }}; {{ !empty($item->padding_x) || !empty($item->padding_y) ? 'padding: '. $item->padding_y .'rem '.  $item->padding_x.'rem;' : '' }} ">
                    @if(!empty($item->imagem) && strtolower($item->lado_imagem ?? '') == 'top')
                        <img src="{{ Storage::url($item->imagem) }}" class=" conteudo grow mb-4 block w-full" style=" min-height: {{ $item->tamanho_imagem }}rem;">
                    @endif
                    <div class=" conteudo inline-block">{!! $item->conteudo !!}</div>
                </div>

            @else
        <div class="relative lg:flex conteudo"  style=" background: {{ $item->cor_fundo }}; {{ !empty($item->padding_x) || !empty($item->padding_y) ? 'padding: '. $item->padding_y .'rem '.  $item->padding_x.'rem;' : '' }} ">
            @if(!empty($item->imagem) && strtolower($item->lado_imagem ?? '') == 'left')
                <img src="{{ Storage::url($item->imagem) }}" class=" conteudo lg:mr-4 mb-4 inline-block grow" style=" max-height: {{ $item->tamanho_imagem * 10 }}rem;">
            @endif
            
            <div class=" inline-block conteudo">{!! $item->conteudo !!}</div>

            @if(!empty($item->imagem) && strtolower($item->lado_imagem ?? '') == 'right')
                <img src="{{ Storage::url($item->imagem) }}" class=" conteudo grow lg:ml-4 mb-4 inline-block" style=" max-height: {{ $item->tamanho_imagem * 10 }}rem;">
            @endif 
            
        </div>
            @endif
        @endif
        
        @if(!empty($item->form_contato))
        <div class="conteudo" style="background: {{ $item->cor_fundo }}; {{ !empty($item->padding_x) || !empty($item->padding_y) ? 'padding: '. $item->padding_y .'rem '.  $item->padding_x.'rem;' : '' }}">
            <livewire:site.componente.form-contato />
        </div>
        @endif  

        @if(!empty($item->galerias_id))
        <div class="conteudo" style="background: {{ $item->cor_fundo }}; {{ !empty($item->padding_x) || !empty($item->padding_y) ? 'padding: '. $item->padding_y .'rem '.  $item->padding_x.'rem;' : '' }}">
            <livewire:site.componente.galeria :idGaleria="$item->galerias_id" />
        </div>
        @endif  

        @if(!empty($item->blog))
        <div class="conteudo" style="background: {{ $item->cor_fundo }}; {{ !empty($item->padding_x) || !empty($item->padding_y) ? 'padding: '. $item->padding_y .'rem '.  $item->padding_x.'rem;' : '' }}">
            <livewire:site.componente.blog :menu="$menuAtivo" :id="$idAtivo" />
        </div>
        @endif  

        @if(!empty($item->mostrar_blog_resumo))
        <div class="conteudo" style="background: {{ $item->cor_fundo }}; {{ !empty($item->padding_x) || !empty($item->padding_y) ? 'padding: '. $item->padding_y .'rem '.  $item->padding_x.'rem;' : '' }}">
            <livewire:site.componente.blog-resumo />
        </div>
        @endif

    @endforeach

    @if(count($paginas) == 0)
        <div class=" w-full p-20 font-semibold text-xl text-center bg-gray-200">Página não encontrada.</div>
    @endif

    <style>
    @media only screen and (max-width: 1024px) {
        .conteudo {
          padding: 2rem 2rem !important;
        }
      }
    </style>
</div>
