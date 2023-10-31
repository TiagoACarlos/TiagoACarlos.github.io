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
                    <label for="" class=" text-sm font-semibold text-gray-600">Icone</label>
                    <input type="text" name="icone" wire:model="icone" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Icone">
                    @error('icone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>                 

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Link</label>
                    <input type="text" name="link" wire:model="link" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Link">
                    @error('link') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>  
                
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor do Texto</label>
                    <input type="color" name="cor_texto" wire:model="cor_texto" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor do Texto">
                    @error('cor_texto') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>  
                      
                <div class="mt-4 lg:col-span-4">
                    <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>

            <div class=" bg-gray-100 rounded-lg p-2 my-4 mx-4">
                <table class=" table-auto w-full ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Icone</th>
                            <th>Link</th>
                            <th>Cor Texto</th>
                            <th>Cor Fundo</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($redes as $item)
                        <tr class=" text-center bg-white">
                            <td class="p-2 ">{{ $item->id }}</td>
                            <td class="p-2 ">{{ $item->descricao }}</td>
                            <td class="p-2 ">{!! $item->icone !!}</td>
                            <td class="p-2 ">{{ $item->link }}</td>
                            <td class="p-2 ">{{ $item->cor_texto }}</td>
                            <td class="p-2 ">{{ $item->cor_fundo }}</td>
                            <td class="p-2 "><button wire:click="apagar({{ $item->id }})" class=" text-red-600 rounded-lg font-semibold"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>

        <livewire:sistema.componente.site-view />

    </div>

</div>
