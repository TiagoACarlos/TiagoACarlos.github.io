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
                    <label for="" class=" text-sm font-semibold text-gray-600">Nome do Menu</label>
                    <input type="text" name="menu" wire:model="menu"
                        class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Nome do Menu">
                    @error('menu')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Sub. Menu</label>
                    <select name="menus_id" wire:model="menus_id"
                        class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                        <option class="0" selected>-- Sub. Menu --</option>
                        @foreach ($menusRaiz as $item)
                            <option value="{{ $item->id }}" class="">{{ $item->menu }}</option>
                        @endforeach
                    </select>
                    @error('menus_id')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Ordem do Menu</label>
                    <input type="text" name="classificacao" wire:model="classificacao"
                        class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Nome do Menu">
                    @error('classificacao')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Página Inicial</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="pagina_inicial" wire:model="pagina_inicial"><span>
                            Sim</span>
                        <input type="radio" value="0" name="pagina_inicial" wire:model="pagina_inicial"><span>
                            Não</span>
                    </div>
                    @error('pagina_inicial')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>





                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Link externo</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="link_externo" wire:model="link_externo"><span>
                            Sim</span>
                        <input type="radio" value="0" name="link_externo" wire:model="link_externo"><span>
                            Não</span>
                    </div>
                    @error('link_externo')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">URL</label>
                    <input type="text" name="url" wire:model="url"
                        class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="URL">
                    @error('url')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tem Banner</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="tem_banner" wire:model="tem_banner"><span> Sim</span>
                        <input type="radio" value="0" name="tem_banner" wire:model="tem_banner"><span> Não</span>
                    </div>
                    @error('tem_banner')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                @if (!empty($erroLogin))
                    <span class="text-red-400 text-sm text-center p-2 block">{{ $erroLogin }}</span>
                @endif
                <div class="mt-4 lg:col-span-4">
                    <button type="submit"
                        class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>

            <div class=" bg-gray-100 rounded-lg p-2 my-4 mx-4">
                <table class=" table-auto w-full ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Sub. Menu</th>
                            <th>Classificação</th>
                            <th>Pag. Inicial</th>
                            <th>Tem Banner</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $item)
                            <tr class=" text-center bg-white">
                                <td class="p-2 ">{{ $item->id }}</td>
                                <td class="p-2 ">{{ $item->menu }}</td>
                                <td class="p-2 ">{{ $item->submenus->menu ?? '-' }}</td>
                                <td class="p-2 ">{{ $item->classificacao }}</td>
                                <td class="p-2 ">{{ $item->pagina_inicial ? 'Sim' : 'Não' }}</td>
                                <td class="p-2 ">{{ $item->tem_banner ? 'Sim' : 'Não' }}</td>
                                <td class="p-2 "><button wire:click="apagar({{ $item->id }})"
                                        class=" text-red-600 rounded-lg font-semibold"><i
                                            class="fa-solid fa-trash-can"></i></button></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <livewire:sistema.componente.site-view />

    </div>

</div>
