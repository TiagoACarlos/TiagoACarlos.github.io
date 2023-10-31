<div class=" bg-white w-auto min-h-screen">
    {{-- <livewire:sistema.componente.menu /> --}}

    <livewire:sistema.componente.botoes-menu-sair />

    <div style=" display: {{ $menuAtivo }};">
        <livewire:sistema.componente.menu />
    </div>

    <div class="grid">
        <div class=" bg-white border-b pb-4" style=" display: {{ $menuAtivo }};">
            <form wire:submit.prevent="salvar" class="grid lg:grid-cols-4 lg:gap-4 mt-16 px-5">

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor de Fundo</label>
                    <input type="color" name="cor_fundo" wire:model.defer="cor_fundo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor de Fundo">
                    @error('cor_fundo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fonte</label>
                    <input type="color" name="cor_fonte" wire:model.defer="cor_fonte" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor da Fonte">
                    @error('cor_fonte') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho da Fonte</label>
                    <input type="text" name="tamanho_fonte" wire:model.defer="tamanho_fonte" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Tamanho da Fonte">
                    @error('tamanho_fonte') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding X</label>
                    <input type="text" name="padding_x" wire:model.defer="padding_x" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding X">
                    @error('padding_x') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding Y</label>
                    <input type="text" name="padding_y" wire:model.defer="padding_y" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding Y">
                    @error('padding_y') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Altura do Input</label>
                    <input type="text"  placeholder="Altura do Input" name="altura_input" wire:model.defer="altura_input" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('altura_input') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Lado do Text</label>
                    <input type="text"  placeholder="Lado do Text" name="lado_text" wire:model.defer="lado_text" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('lado_text') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Mostrar Redes Sociais</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="tem_redes_socias" wire:model="tem_redes_socias"><span> Sim</span>
                        <input type="radio" value="0" name="tem_redes_socias" wire:model="tem_redes_socias"><span> Não</span>
                    </div>                   
                    @error('tem_redes_socias') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">E-mail de Destino</label>
                    <input type="text"  placeholder="E-mail de Destino" name="email_destino" wire:model.defer="email_destino" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('email_destino') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                

                <div class="mt-4 lg:col-span-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Conteúdo</label>
                    <textarea wire:model.defer="conteudo" class=" h-48 border rounded-md p-2 focus:outline-none block w-full" placeholder="Conteúdo">{{ $conteudo }}</textarea >
                    @error('conteudo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>
                      
                <div class="mt-4 lg:col-span-4">
                    <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>



        </div>

        <livewire:sistema.componente.site-view :menu="$menu" :pagina="$pagina" />

    </div>

</div>
