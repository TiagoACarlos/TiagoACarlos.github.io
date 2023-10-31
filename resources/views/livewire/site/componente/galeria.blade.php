<div class=" my-5" style="background: {{ $galeria->cor_fundo ?? ''}};">

    <div class="my-2">
        @if(!empty($galeria->mostrar_texto))
        {!! $galeria->descricao ?? '' !!}
        @endif
    </div>

    <div class="grid galeria"  style=" gap: {{ $galeria->gap ?? 0 }}rem; grid-template-columns: repeat({{ $galeria->grid ?? 1 }}, minmax(0, 1fr)); text-align: {{ $galeria->lado_text ?? 'left'}}; ">
        @foreach($fotos as $item)
        <div class=" overflow-hidden" style="  padding: {{ $galeria->padding ?? 0 }}; border-style: solid; border-width: {{ $galeria->borda ?? 0 }}px; border-color: {{ $galeria->cor_borda }}; border-radius: {{ $galeria->border_radius }};">
            <img src="{{ Storage::url($item->imagem) }}" wire:click="modalImagem({{ $item->id }})" class=" hover:opacity-80 cursor-pointer" alt="" style=" border-radius: {{ $galeria->border_radius_imagem }}; border-style: solid; padding: {{ $galeria->padding_imagem }}; border-width: {{ $galeria->borda_imagem }}px; border-color: {{ $galeria->cor_borda_imagem }}">
            @if(!empty($galeria->mostrar_texto))
            <h3 class=" font-semibold" style="font-size: {{ $galeria->tamanho_fonte_titulo }}rem; color: {{ $galeria->cor_fonte_titulo }}; ">{{ $item->titulo }}</h3>
            <p class=" text-xs"  style="font-size: {{ $galeria->tamanho_fonte_texto }}rem; color: {{ $galeria->cor_fonte_texto }}; ">{{ $item->descricao }}</p>
            @endif
        </div>
        @endforeach
    </div>

    @if(!empty($imagemModal->id))
    <div class=" bg-black/60 fixed top-0 bottom-0 left-0 right-0">
        <div class=" mx-5 lg:mx-auto shadow-md lg:max-w-2xl mt-28 bg-white p-1 relative" style=" border-radius: {{ $galeria->border_radius_imagem }};">
            <button wire:click="fechaModalImagem()" class=" text-white font-semibold text-xs bg-red-600 rounded-md p-3 absolute -top-3 -right-3">Fechar <i class="fa-regular fa-circle-xmark"></i></button>
            <img src="{{ Storage::url($imagemModal->imagem) }}" alt="" style=" border-radius: {{ $galeria->border_radius_imagem }}; border-style: solid; padding: {{ $galeria->padding_imagem }}; border-width: {{ $galeria->borda_imagem }}px; border-color: {{ $galeria->cor_borda_imagem }}">
        </div>
    </div>
    @endif
    <style>
        @media only screen and (max-width: 768px) {
            .galeria {
                grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
            }
        }
    </style>
</div>