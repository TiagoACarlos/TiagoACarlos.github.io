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
                    <label for="" class=" text-sm font-semibold text-gray-600">Espaçamento Entre Postagem</label>
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

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor Fundo Botão</label>
                    <input type="color"  placeholder="cor_fundo_botao" name="cor_fundo_botao" wire:model.defer="cor_fundo_botao" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('cor_fundo_botao') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor da Fonte Botão</label>
                    <input type="color"  placeholder="cor_fonte_botao" name="cor_fonte_botao" wire:model.defer="cor_fonte_botao" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                    @error('cor_fonte_botao') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4 lg:col-span-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Descrição</label>
                    <textarea wire:model.defer="descricao" class=" h-48 border rounded-md p-2 focus:outline-none block w-full" placeholder="Conteúdo">{{ $descricao }}</textarea >
                    @error('descricao') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>


                {{-- <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Mostrar Redes Sociais</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="tem_redes_socias" wire:model="tem_redes_socias"><span> Sim</span>
                        <input type="radio" value="0" name="tem_redes_socias" wire:model="tem_redes_socias"><span> Não</span>
                    </div>                   
                    @error('tem_redes_socias') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> --}}
                      
                <div class="mt-4 lg:col-span-4 grid grid-cols-2 lg:block">
                    <button type="submit" class=" border rounded-md p-2 lg:w-36 focus:outline-none h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>

            <div class=" bg-gray-100 rounded-lg p-2 my-4 mx-4 relative">
                @if(!empty($telaPostagemOn))
                <div class=" fixed bg-black/30 z-50 top-0 bottom-0 left-0 right-0">
                    <div class=" bg-white mt-10 mx-10 py-5 rounded-lg">
                        <h3 class=" font-semibold text-lg px-5">Cadastrar Postagem</h3>
                        <form wire:submit.prevent="salvarPostagem" class="grid lg:grid-cols-4 lg:gap-4 mt-2 px-5">               
                
                            <div class="mt-4">
                                <label for="" class=" text-sm font-semibold text-gray-600">
                                    Categoria da Postagem 
                                    <a wire:click="abrirPostagemCategoria()" class=" w-10 cursor-pointer text-center text-green-600 text-lg font-semibold"><i class="fa-solid fa-circle-plus"></i></a>
                                </label>
                                <select wire:model="blogs_categorias_id" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                                    <option value="" selected>-- Categoria--</option>
                                    @foreach ($blogs_categorias as $item)
                                    <option value="{{ $item->id }}" class="">{{ $item->categoria }}</option>
                                    @endforeach
                                </select>
                                @error('blogs_categorias_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>  

                            <div class="mt-4">
                                <label for="" class=" text-sm font-semibold text-gray-600">Titulo </label>
                                <input type="text" name="titulo" wire:model.defer="titulo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Titulo">
                                @error('titulo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <label for="" class=" text-sm font-semibold text-gray-600">Imagem</label>
                                <input type="file" name="imagem" wire:model.defer="imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Imagem">
                                @error('imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                                
                            </div>
            
                            <div class="mt-4 lg:col-span-4">
                                <label for="" class=" text-sm font-semibold text-gray-600">Resumo</label>
                                <textarea wire:model.defer="resumo" class=" h-32 border rounded-md p-2 focus:outline-none block w-full" placeholder="Resumo">{{ $resumo }}</textarea >
                                @error('resumo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                            </div>

                            <div class="mt-4 lg:col-span-4">
                                <label for="" class=" text-sm font-semibold text-gray-600">Descrição</label>
                                <textarea wire:model.defer="descricaoPost" class=" h-48 border rounded-md p-2 focus:outline-none block w-full" placeholder="Descrição">{{ $descricaoPost }}</textarea >
                                @error('descricaoPost') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                            </div>

                            <div class="mt-4 lg:col-span-4 grid grid-cols-2 lg:block">
                                <button type="submit" class=" border rounded-md p-2 lg:w-36 focus:outline-none h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                                <a wire:click="fecharPostagem()" class=" cursor-pointer border rounded-md py-4 px-8 lg:w-36 focus:outline-none h-14 bg-red-600 text-white font-semibold hover:bg-red-700">Voltar</a>
                            </div>
                        </form>
                    </div>
                    @if(!empty($telaPostagemCategoriaOn))
                    <div class=" bg-black/80 top-0 bottom-0 left-0 right-0 absolute ">
                        <div class=" bg-white mt-20 mx-40 py-5 rounded-lg">
                            <h3 class=" font-semibold text-lg px-5">Cadastrar Categorias</h3>

                            <form wire:submit.prevent="salvarCategoria" class="grid lg:grid-cols-4 lg:gap-4 mt-2 px-5">               
               
                                <div class="mt-4">
                                    <label for="" class=" text-sm font-semibold text-gray-600">Categoria </label>
                                    <input type="text" name="categoria" wire:model.defer="categoria" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Categoria">
                                    @error('categoria') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="mt-4 lg:col-span-4 grid grid-cols-2 lg:block">
                                    <button type="submit" class=" border rounded-md p-2 lg:w-36 focus:outline-none h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                                    <a wire:click="fecharPostagemCategoria()" class=" cursor-pointer border rounded-md py-4 px-8 lg:w-36 focus:outline-none h-14 bg-red-600 text-white font-semibold hover:bg-red-700">Voltar</a>
                                </div>
                            </form>
                            <div class=" grid lg:grid-cols-6 lg:gap-4 mt-2 px-5">
                                @foreach ($blogs_categorias as $item)
                                <div class=" border rounded-md px-4 py-2 bg-gray-200 text-sm font-semibold">
                                    {{ $item->categoria }}
                                    <button wire:click="deletarCategoria({{ $item->id }})" class=" text-red-700 px-2"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                
                <table class=" table-auto w-full ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Resumo</th>
                            <th>Opções                    
                                <button wire:click="abrirPostagem()" class=" border rounded-md px-2 float-right focus:outline-none h-8 bg-green-600 text-white font-semibold hover:bg-green-700">Nova Postagem</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postagens as $item)
                        <tr class=" text-center bg-white">
                            <td class="p-2 ">{{ $item->id }}</td>
                            <td class="p-2 ">{{ $item->titulo }}</td>
                            <td class="p-2 ">{{ substr($item->resumo, 0, 100) }}...</td>
                            <td class="p-2 ">{{-- $item->pagina->menu->menu ?? '' --}}</td>
                            <td class="p-2 grid grid-cols-4">
                                {{-- <button wire:click="editar({{ $item->id }})" class=" text-blue-600 rounded-lg font-semibold"><i class="fa-solid fa-file-pen"></i></button> --}}
                                <button wire:click="apagar({{ $item->id }})" class=" text-red-600 rounded-lg font-semibold"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div> 

        </div>

        <livewire:sistema.componente.site-view />

    </div>

</div>
