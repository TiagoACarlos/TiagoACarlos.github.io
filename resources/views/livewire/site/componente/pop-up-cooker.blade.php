@if(!empty($configuracao->texto_politicas))
<div class=" fixed bottom-2 mx-2 lg:right-0 lg:w-96 bg-white shadow-xl drop-shadow-lg rounded-lg p-2 text-xs z-50" style="display: {{ session('CienteCookers') ? 'none' : 'block' }}; ">
    <div class=" overflow-auto h-32">
        {!! $configuracao->texto_politicas !!}
        <a class=" font-semibold text-blue-600" href="{{ Storage::url($configuracao->arquivo_politicas) }}" target="_blank">Consultar termos e condições</a>
    </div>
    <div class="mt-2 text-right grid">
        <button wire:click="CienteCookers()" class=" p-2 bg-blue-600 text-white font-semibold rounded-md">Ciente</button>
    </div>
</div>
@else
<div class=" hidden"></div>
@endif
