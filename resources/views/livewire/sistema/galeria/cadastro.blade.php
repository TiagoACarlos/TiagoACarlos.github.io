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
                    <label for="" class=" text-sm font-semibold text-gray-600">Galeria</label>
                    <input type="text" name="galeria" wire:model.defer="galeria" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Galeria">
                    @error('galeria') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Descrição</label>
                    <input type="text" name="descricao" wire:model.defer="descricao" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Descrição">
                    @error('descricao') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding </label>
                    <input type="text" name="padding" wire:model.defer="padding" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding">
                    @error('padding') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor de Fundo</label>
                    <input type="color" name="cor_fundo" wire:model.defer="cor_fundo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor de Fundo">
                    @error('cor_fundo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fonte Titulo</label>
                    <input type="color" name="cor_fonte_titulo" wire:model.defer="cor_fonte_titulo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor da Fonte Titulo">
                    @error('cor_fonte_titulo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fonte Texto</label>
                    <input type="color" name="cor_fonte_texto" wire:model.defer="cor_fonte_texto" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor da Fonte Textp">
                    @error('cor_fonte_texto') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho da Fonte Titulo</label>
                    <input type="text" name="tamanho_fonte_titulo" wire:model.defer="tamanho_fonte_titulo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Tamanho da Fonte Titulo">
                    @error('tamanho_fonte_titulo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho da Fonte Texto</label>
                    <input type="text" name="tamanho_fonte_texto" wire:model.defer="tamanho_fonte_texto" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Tamanho da Fonte Texto">
                    @error('tamanho_fonte_texto') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>


                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Colunas da Grid</label>
                    <input type="text" name="grid" wire:model.defer="grid" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Grid">
                    @error('grid') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>  
                
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Espaçamento Entre Fotos</label>
                    <input type="text" name="gap" wire:model.defer="gap" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Gap">
                    @error('gap') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 
                 
                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Mostrar Texto</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="mostrar_texto" wire:model="mostrar_texto"><span> Sim</span>
                        <input type="radio" value="0" name="mostrar_texto" wire:model="mostrar_texto"><span> Não</span>
                    </div>                   
                    @error('mostrar_texto') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Borda</label>
                    <input type="text"  placeholder="Borda" name="borda" wire:model.defer="borda" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('borda') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor Borda</label>
                    <input type="color"  placeholder="Cor da Borda" name="altura_input" wire:model.defer="cor_borda" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('cor_borda') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Borda Radius</label>
                    <input type="text"  placeholder="border_radius" name="border_radius" wire:model.defer="border_radius" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('border_radius') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Borda da Imagem</label>
                    <input type="text"  placeholder="borda_imagem" name="borda_imagem" wire:model.defer="borda_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('borda_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Borda da Imagem</label>
                    <input type="color"  placeholder="cor_borda_imagem" name="cor_borda_imagem" wire:model.defer="cor_borda_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('cor_borda_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding Imagem</label>
                    <input type="text"  placeholder="padding_imagem" name="padding_imagem" wire:model.defer="padding_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('padding_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Border Radius Imagem</label>
                    <input type="text"  placeholder="border_radius_imagem" name="border_radius_imagem" wire:model.defer="border_radius_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('border_radius_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Lado do Text</label>
                    <input type="text"  placeholder="Lado do Text" name="lado_text" wire:model.defer="lado_text" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('lado_text') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Mostrar Redes Sociais</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="tem_redes_socias" wire:model="tem_redes_socias"><span> Sim</span>
                        <input type="radio" value="0" name="tem_redes_socias" wire:model="tem_redes_socias"><span> Não</span>
                    </div>                   
                    @error('tem_redes_socias') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> --}}
                      
                <div class="mt-4 lg:col-span-4">
                    <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>

            <div class=" bg-gray-100 rounded-lg p-2 my-4 mx-4">
                <table class=" table-auto w-full ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Galeria</th>
                            <th>Descrição</th>
                            <th>Grid</th>
                            <th>Pagina</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galerias as $item)
                        <tr class=" text-center bg-white">
                            <td class="p-2 ">{{ $item->id }}</td>
                            <td class="p-2 ">{{ $item->galeria }}</td>
                            <td class="p-2 ">{{ substr($item->descricao, 0, 100) }}...</td>
                            <td class="p-2 ">{{ $item->Grid }}</td>
                            <td class="p-2 ">{{ $item->pagina->menu->menu ?? '' }}</td>
                            <td class="p-2 grid grid-cols-4">
                                <button wire:click="editar({{ $item->id }})" class=" text-blue-600 rounded-lg font-semibold"><i class="fa-solid fa-file-pen"></i></button>
                                <button wire:click="apagar({{ $item->id }})" class=" text-red-600 rounded-lg font-semibold"><i class="fa-solid fa-trash-can"></i></button>
                                <button wire:click="OpenUploadImagem({{ $item->id }})" class=" text-green-600 rounded-lg font-semibold"><i class="fa-regular fa-image"></i></button>
                                <a href="{{ route('sistema.setup.galeria', [$item->id] ) }}"><i class="fa-solid fa-link"></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div> 

        </div>

        <livewire:sistema.componente.site-view :menu="$menu" :pagina="$pagina" />

    </div>

    @if(!empty($uploadOn))
    <div class="absolute left-0 top-0 right-0 bottom-0 bg-black/80 z-50">
        <div class=" mx-20 bg-white mt-20 rounded-lg p-5">
            <div class="grid lg:grid-cols-4 lg:gap-4 mt-16 px-5">               

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Titulo</label>
                    <input type="text" name="titulo" wire:model.defer="titulo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Titulo">
                    @error('titulo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Descrição Foto</label>
                    <input type="text" name="descricaoFoto" wire:model.defer="descricaoFoto" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Descrição Foto">
                    @error('descricaoFoto') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Imagem</label>
                    <input type="file" name="imagem" wire:model.defer="imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Imagem">
                    @error('imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>
                      
                <div class="mt-4 lg:col-span-4">
                    <button wire:click="upload()" class=" border inline-block rounded-md p-2 lg:w-32 focus:outline-none w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                    <button wire:click="CloseUploadImagem()" class=" border inline-block rounded-md p-2 lg:w-32 focus:outline-none w-full h-14 bg-red-600 text-white font-semibold hover:bg-red-700"><i class="fa-solid fa-door-open"></i> Sair</button>

                </div>
            </div>

            <div class="grid lg:grid-cols-6 gap-4 mt-4">
                @foreach($fotos as $item)
                <div class="">
                    <button wire:click="DeleteFoto({{ $item->id }})" class=" absolute text-red-600 rounded-lg font-semibold m-2 text-lg"><i class="fa-solid fa-trash-can"></i></button>
                    <img src="{{ Storage::url($item->imagem) }}" alt="">
                    <h3 class=" font-semibold">{{ $item->titulo }}</h3>
                    <p class=" text-xs">{{ $item->descricao }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

</div>
