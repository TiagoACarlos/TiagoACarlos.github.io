<div class=" grid lg:grid-cols-2" style=" background: {{ $contato->cor_fundo }}; padding: {{ $contato->padding_y }}rem {{ $contato->padding_x }}rem;">

    <div wire:loading.delay>
        <livewire:site.componente.wire-loading />
    </div>

    @if (strtolower($contato->lado_text) == 'left')       
        <div style=" font-size: {{ (float)$contato->tamanho_fonte }}rem;">
            <p>{!! $contato->conteudo !!}</p>
            @if(!empty($contato->tem_redes_socias))
            <div class=""  style=" font-size: {{ (float)$contato->tamanho_fonte * 2 }}rem;">
                @foreach ($redes as $item)
                <a href="{{ $item->link }}" target="_black" class=" inline-block p-2" style=" color: {{ $item->cor_texto }};">{!! $item->icone !!}</a>
                @endforeach
            </div>
            @endif
        </div>

        <form wire:submit.prevent="sendMail()" class="grid ">           

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-white">Nome Completo</label>
                <input type="text" style=" height: {{ (float)$contato->altura_input }}rem;" name="nome" wire:model.defer="nome" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Nome completo">
                @error('nome') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-white">E-mail</label>
                <input type="text" style=" height: {{ (float)$contato->altura_input }}rem;" name="email" wire:model.defer="email" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="E-mail">
                @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-white">Telefone</label>
                <input type="text" style=" height: {{ (float)$contato->altura_input }}rem;" name="telefone" wire:model.defer="telefone" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Telefone">
                @error('telefone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-white">Assunto</label>
                <input type="text" style=" height: {{ (float)$contato->altura_input }}rem;" name="assunto" wire:model.defer="assunto" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Assunto">
                @error('assunto') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-white">Conteúdo</label>
                <textarea wire:model.defer="conteudo" style=" height: {{ (float)$contato->altura_input * 4 }}rem;" class=" border rounded-md p-2 focus:outline-none block w-full" placeholder="Conteúdo">{{ $conteudo }}</textarea >
                @error('conteudo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
            </div>
                    
            <div class="mt-4">
                <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
            </div>

            @if(!empty($msgFail))
            <div class="mt-4 font-semibold bg-red-300 text-red-700 p-2 rounded-lg">
                {{ $msgFail }} Erro ao enviar o e-mail.
            </div>
            @endif

            @if(!empty($msgSucess))
            <div class="mt-4 font-semibold bg-green-300 text-green-700 p-2 rounded-lg">
                {{ $msgSucess }} E-mail enviado com suecsso.
            </div>
            @endif

        </form>
    @else
        <form wire:submit.prevent="sendMail()" class="grid ">

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-gray-600" >Nome Completo</label>
                <input type="text" name="nome" wire:model.defer="nome" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Nome completo">
                @error('nome') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-gray-600">E-mail</label>
                <input type="text" name="email" wire:model.defer="email" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="E-mail">
                @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-gray-600">Telefone</label>
                <input type="text" name="telefone" wire:model.defer="telefone" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Telefone">
                @error('telefone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-gray-600">Assunto</label>
                <input type="text" name="assunto" wire:model.defer="assunto" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Assunto">
                @error('assunto') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label for="" class=" text-sm font-semibold text-gray-600">Conteúdo</label>
                <textarea wire:model.defer="conteudo" class=" h-48 border rounded-md p-2 focus:outline-none block w-full" placeholder="Conteúdo">{{ $conteudo }}</textarea >
                @error('conteudo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
            </div>
                    
            <div class="mt-4">
                <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
            </div>
        </form>

        <div style=" font-size: {{ (float)$contato->tamanho_fonte }}rem;">
            {!! $contato->conteudo !!}
            @if(!empty($contato->tem_redes_socias))
            <div class=""  style=" font-size: {{ (float)$contato->tamanho_fonte * 2 }}rem;">
                @foreach ($redes as $item)
                <a href="{{ $item->link }}" target="_black" class=" inline-block p-2" style=" color: {{ $item->cor_texto }};">{!! $item->icone !!}</a>
                @endforeach
            </div>
            @endif
        </div>

    @endif

    
</div>

