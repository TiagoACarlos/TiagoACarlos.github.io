<div class="" style="background: {{ $blog->cor_fundo ?? ''}};">

    @if (empty($postagemCarregada))

        <div class="my-2">
            @if(!empty($blog->mostrar_texto))
            {!! $blog->descricao ?? '' !!}
            @endif
        </div>

        @if (count($postagens) > 0)

        <div class=" my-4">
            @foreach ($categorias as $item)
            <button wire:click="filtrarCat({{ $item->id }})" class=" px-4 py-4 font-semibold text-sm mt-2 hover:opacity-80 rounded-md" style=" color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};">{{ $item->categoria }}</button>
            @endforeach

            @if (!empty($filtroCategoria))
            <button wire:click="filtrarCat('')" class=" px-4 py-4 font-semibold text-sm mt-2 hover:opacity-80 rounded-md" style=" color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};"><i class="fa-solid fa-circle-xmark"></i> Limpar</button>
            @endif

        </div>

        <div class="grid blog"  style=" gap: {{ $blog->gap ?? 0 }}rem; grid-template-columns: repeat({{ $blog->grid ?? 1 }}, minmax(0, 1fr)); text-align: {{ $blog->lado_text ?? 'left'}}; ">
            @foreach($postagens as $item)
            <div class=" overflow-hidden grid grid-cols-4 gap-4" style="  padding: {{ $blog->padding ?? 0 }}; border-style: solid; border-width: {{ $blog->borda ?? 0 }}px; border-color: {{ $blog->cor_borda }}; border-radius: {{ $blog->border_radius }};">
                <a href="javascript:void(0);" wire:click="postagem({{ $item->id }}, 1)">
                    <img src="{{ Storage::url($item->imagem) }}" alt="" style=" border-radius: {{ $blog->border_radius_imagem }}; border-style: solid; padding: {{ $blog->padding_imagem }}; border-width: {{ $blog->borda_imagem }}px; border-color: {{ $blog->cor_borda_imagem }}">
                </a>
                <div class=" col-span-3">
                    @if(!empty($blog->mostrar_texto))
                    <a href="javascript:void(0);" wire:click="postagem({{ $item->id }})">
                        <h3 class=" font-semibold" style="font-size: {{ $blog->tamanho_fonte_titulo }}rem; color: {{ $blog->cor_fonte_titulo }}; ">
                            {{ $item->titulo }} <span class=" text-xs block opacity-80 mb-2">Postagem em: {{ date_format($item->created_at,"d/m/Y H:i    ") }} - {{ $item->categoria->categoria }}</span> 
                        </h3>
                    </a>
                    <p class=" text-xs"  style="font-size: {{ $blog->tamanho_fonte_texto }}rem; color: {{ $blog->cor_fonte_texto }}; ">
                        {!! $item->resumo !!}
                    </p>
                    <button wire:click="postagem({{ $item->id }})" class=" px-2 py-1 font-semibold text-sm mt-4 hover:opacity-80 rounded-md" style=" color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};">Continuar Lendo</button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="block h-16 mt-4 mx-auto">
            {{ $postagens->links('livewire.pagination-links') }}
        </div>
        @endif          
    @endif

    @if (!empty($postagemCarregada) && count($postagens) > 0)
    <div class="blog">
        <div class=" my-4" style="">
            <div class=" grid grid-cols-2 px-4 font-semibold rounded-md my-4" style=" color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};">
                <span class=" h-10 py-2 block">{{ $postagem->categoria->categoria ?? '' }}</span>
                <div>
                    <button wire:click="voltar()" class=" float-right px-4 py-2 font-semibold hover:opacity-80 rounded-md" style=" color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};">
                        <i class="fa-solid fa-angles-left"></i> Voltar
                    </button>
                </div>
            </div>

            <h3 class=" font-semibold" style="font-size: {{ $blog->tamanho_fonte_titulo }}rem; color: {{ $blog->cor_fonte_titulo }}; ">
                {{ $postagem->titulo }} <span class=" text-xs block opacity-80">Postagem em: {{ date_format($postagem->created_at,"d/m/Y H:i    ") }}</span>           
            </h3>
        </div>       
        
        <p class=" text-xs"  style="font-size: {{ $blog->tamanho_fonte_texto }}rem; color: {{ $blog->cor_fonte_texto }}; ">
            {!! $postagem->postagem !!}
        </p> <br>

        <div class="">
            <h3 class=" font-semibold text-xl my-4">Postagens relacionadas:</h3>
            <div class=" overflow-hidden grid grid-cols-2 lg:grid-cols-4 gap-4" style=" border-style: solid; border-width: {{ $blog->borda ?? 0 }}px; border-color: {{ $blog->cor_borda }}; border-radius: {{ $blog->border_radius }};">
            @foreach ($postagemRelacionadas as $item)
                <a class="block" href="javascript:void(0);" wire:click="postagem({{ $item->id }})">
                    <img src="{{ Storage::url($item->imagem) }}" alt="" style=" border-radius: {{ $blog->border_radius_imagem }}; border-style: solid; padding: {{ $blog->padding_imagem }}; border-width: {{ $blog->borda_imagem }}px; border-color: {{ $blog->cor_borda_imagem }}" />
                    <h3 class=" font-semibold mt-2 text-sm" style=" color: {{ $blog->cor_fonte_titulo }}; ">{{ $item->titulo }}</h3>
                </a>
            @endforeach               
            </div>       

        </div>
    </div>
    @endif    

    @if(session('back'))
        <script>
            window.history.back();
        </script>
    @endif


    <style>
        @media only screen and (max-width: 768px) {
            .blog {
                grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
            }
        }
    </style>

    <style>
        .pgAtual {
            color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};
            border:none;
        }

        .pgNext {
            color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};
            border:none;
            opacity: 0.6;
        }

        .pgEnd {
            color: {{ $blog->cor_fonte_botao }}; background: {{ $blog->cor_fundo_botao ?? ''}};
            border:none;
        }

    </style>
</div>