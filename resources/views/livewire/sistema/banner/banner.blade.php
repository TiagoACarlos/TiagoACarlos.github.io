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
                    <label for="" class=" text-sm font-semibold text-gray-600">Descrição</label>
                    <input type="text" name="descricao" wire:model="descricao" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Descrição">
                    @error('descricao') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fonte</label>
                    <input name="cor_fonte" type="color" wire:model="cor_fonte" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor da Fonte">
                    @error('cor_fonte') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fundo</label>
                    <input name="cor_fundo" type="color" wire:model="cor_fundo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor da Fundo">
                    @error('cor_fundo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho Fonte</label>
                    <input type="text" name="tamanho_fonte" wire:model="tamanho_fonte" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Tamanho Fonte">
                    @error('tamanho_fonte') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Altura do Banner</label>
                    <input type="text" name="altura" wire:model="altura" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Altura do Banner">
                    @error('altura') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Imagem</label>
                    <input type="file" name="imagem" wire:model.defer="imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Descrição">
                    @error('imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    
                </div>
                      
                <div class="mt-4 lg:col-span-4">
                    <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>
        </div>

        <livewire:sistema.componente.site-view />

    </div>

</div>
