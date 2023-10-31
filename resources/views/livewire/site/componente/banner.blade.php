<div class=" w-auto overflow-hidden relative text-left" style="background: {{ $banner->cor_fundo ?? '' }};">
 
    <span  style=" color: {{ $banner->cor_fonte ?? '' }}; font-size: {{ $banner->tamanho_fonte ?? '' }}em;" class=" bottom-0 absolute m-10 lg:m-24 lg:ml-48">{{ $banner->descricao ?? '' }}</span>

    <img src="{{ !empty($banner->imagem) ? Storage::url($banner->imagem) : asset('img/banner-02.png') }}" class=" w-full block " style=" max-height: {{ $banner->altura ?? '' }}rem;">

</div>
