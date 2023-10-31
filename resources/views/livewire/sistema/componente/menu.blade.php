<div class=" h-16 w-auto">
    <div class=" mx-28">
        @foreach ($etapas as $item)
        <a href="{{ route($item['rota']) }}" class=" bg-gray-600 text-white text-sm font-semibold inline-block h-10 px-2 mx-auto py-2 rounded-b-lg">{{ $item['nome'] }}</a>
        @endforeach
    </div>
    
</div>