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
                    <label for="" class=" text-sm font-semibold text-gray-600">Titulo da Página</label>
                    <input type="titulo" name="titulo" wire:model.defer="titulo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Titulo da Página">
                    @error('titulo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Icone</label>
                    <input type="file" name="icone" wire:model.defer="icone" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Titulo da Página">
                    @error('icone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    @if(!empty($obj->icone))
                        <p class=" text-xs pt-2 font-semibold">{{ $obj->icone }}</p>
                        <img src="{{ Storage::url($obj->icone) }}" alt="" class=" w-12 mt-2">

                    @endif
                </div> --}}

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Logo Menu</label>
                    <input type="file" name="logo_menu" wire:model.defer="logo_menu" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Logo Menu">
                    @error('logo_menu') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    @if(!empty($obj->logo_menu))
                        <img src="{{ Storage::url($obj->logo_menu) }}" alt="" class=" w-20 mt-2">
                    @endif
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Logo Footer</label>
                    <input type="file" name="logo_footer" wire:model.defer="logo_footer" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Logo Footer">
                    @error('logo_footer') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    @if(!empty($obj->logo_footer))
                        <img src="{{ Storage::url($obj->logo_footer) }}" alt="" class=" w-20 mt-2">
                    @endif
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Arquivo PDF das Politicas</label>
                    <input type="file" name="arquivo_politicas" wire:model.defer="arquivo_politicas" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Arquivo PDF das Politicas">
                    @error('arquivo_politicas') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    @if(!empty($obj->arquivo_politicas))
                        <p class=" text-xs pt-2 font-semibold">{{ $obj->arquivo_politicas }}</p>
                    @endif
                </div>


                <div class="mt-4 lg:col-span-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Texto PopUp Politicas</label>
                    <textarea wire:model.defer="texto_politicas" class=" h-48 border rounded-md p-2 focus:outline-none block w-full" placeholder="Conteúdo">{{ $texto_politicas }}</textarea >
                    @error('texto_politicas') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>
                      
                <div class="mt-4 lg:col-span-4">
                    <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>



        </div>

        <livewire:sistema.componente.site-view />

    </div>

</div>
