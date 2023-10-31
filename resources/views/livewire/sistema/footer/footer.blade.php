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
                    <input type="color" name="cor_fundo" wire:model="cor_fundo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor de Fundo">
                    @error('cor_fundo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fonte</label>
                    <input name="cor_fonte" type="color" wire:model="cor_fonte" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor da Fonte">
                    @error('cor_fonte') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho da Fonte</label>
                    <input name="tamanho_fonte" type="text" wire:model="tamanho_fonte" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Tamanho da Fonte">
                    @error('tamanho_fonte') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Altura da Footer</label>
                    <input name="tamanho_footer" type="text" wire:model="tamanho_footer" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Altura da Footer">
                    @error('tamanho_footer') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 
                {{-- <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Posição do Menu</label>
                    <input name="posicao_menu" type="text" wire:model="posicao_menu" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Posição do Menu">
                    @error('posicao_menu') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> --}}
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Alinhamento do Texto</label>
                    <input name="text_align" type="text" wire:model="text_align" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Alinhamento do Texto">
                    @error('text_align') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>  
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding-top do Texto</label>
                    <input name="padding_top" type="text" wire:model="padding_top" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding-top do Texto">
                    @error('padding_top') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>  
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding-x do Texto</label>
                    <input name="padding_x" type="text" wire:model="padding_x" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding-x do Texto">
                    @error('padding_x') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 

                <div></div>
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor de Fundo Copyright</label>
                    <input type="color" name="cor_fundo" wire:model="cor_fundo_vennx" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor de Fundo">
                    @error('cor_fundo_vennx') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fonte Copyright</label>
                    <input name="cor_fonte_vennx" type="color" wire:model="cor_fonte_vennx" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor da Fonte">
                    @error('cor_fonte_vennx') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho da Fonte Copyright</label>
                    <input name="tamanho_fonte_vennx" type="text" wire:model="tamanho_fonte_vennx" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Tamanho da Fonte">
                    @error('tamanho_fonte_vennx') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Altura da Footer Copyright</label>
                    <input name="tamanho_footer_vennx" type="text" wire:model="tamanho_footer_vennx" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Altura da Footer">
                    @error('tamanho_footer_vennx') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding-top do Texto Copyright</label>
                    <input name="padding_top_vennx" type="text" wire:model="padding_top_vennx" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding-top do Texto">
                    @error('padding_top_vennx') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 
                      
                @if(!empty($erroLogin)) <span class="text-red-400 text-sm text-center p-2 block">{{ $erroLogin }}</span> @endif
                <div class="mt-4 lg:col-span-4">
                    <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>
        </div>

        <livewire:sistema.componente.site-view />
        
    </div>

</div>
