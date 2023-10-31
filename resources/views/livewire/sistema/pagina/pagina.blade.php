<div class=" bg-white w-auto min-h-screen">
    {{-- <livewire:sistema.componente.menu /> --}}

    <livewire:sistema.componente.botoes-menu-sair />

    <div style=" display: {{ $menuAtivo }};">
        <livewire:sistema.componente.menu />
    </div>

    

    <div class="grid">
        <div class=" bg-white border-b pb-4" style=" display: {{ $menuAtivo }};">

            @if(empty($paginaEditAtivo))
            <form wire:submit.prevent="salvar" class="grid lg:grid-cols-4 lg:gap-4 mt-16 px-5">

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Sub. Menu</label>
                    <select name="menus_id" wire:model="menus_id" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                        <option class="0" selected>-- Selcione o Menu --</option>
                        @foreach ($menus as $item)
                        <option value="{{ $item->id }}" class="">{{ $item->menu }}</option>
                        @endforeach
                    </select>
                    @error('menus_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 
                <div class=" lg:col-span-3"></div>

                @if ($menus_id > 0)

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor de Fundo</label>
                    <input type="color" name="cor_fundo" wire:model.defer="cor_fundo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor de Fundo">
                    @error('cor_fundo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Imagem</label>
                    <input type="file" name="imagem" wire:model.defer="imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Descrição">
                    @error('imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Lado da Imagem</label>
                    <input type="text" name="cor_fundo" wire:model.defer="lado_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Lado da Imagem">
                    @error('lado_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho da Imagem</label>
                    <select name="tamanho_imagem" wire:model.defer="tamanho_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                        <option class="0" selected>-- Selcione o tamanho --</option>
                        <option value="1" class="">Pequena</option>
                        <option value="2" class="">Média</option>
                        <option value="3" class="">Grande</option>
                    </select>
                    @error('tamanho_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Adicionar Form. de Contat?</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="form_contato" wire:model="form_contato"><span> Sim</span>
                        <input type="radio" value="0" name="form_contato" wire:model="form_contato"><span> Não</span>
                    </div>                   
                    @error('form_contato') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Adicionar Blog?</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="blog" wire:model="blog"><span> Sim</span>
                        <input type="radio" value="0" name="blog" wire:model="blog"><span> Não</span>
                    </div>                   
                    @error('blog') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Blog Resumido?</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="mostrar_blog_resumo" wire:model="mostrar_blog_resumo"><span> Sim</span>
                        <input type="radio" value="0" name="mostrar_blog_resumo" wire:model="mostrar_blog_resumo"><span> Não</span>
                    </div>                   
                    @error('mostrar_blog_resumo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Galeria</label>
                    <select name="galerias_id" wire:model.defer="galerias_id" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                        <option class="0" selected>-- Selcione a Galeria --</option>
                        @foreach ($galerias as $item)
                        <option value="{{ $item->id }}" class="">{{ $item->galeria }}</option>
                        @endforeach
                    </select>
                    @error('galerias_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
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

                <div class="mt-4 lg:col-span-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Conteúdo</label>
                    <textarea wire:model.defer="conteudo" class=" h-48 border rounded-md p-2 focus:outline-none block w-full" placeholder="Conteúdo">{{ $conteudo }}</textarea >
                    @error('conteudo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>

                @endif
                      
                <div class="mt-4 lg:col-span-4">
                    <button type="submit" class=" border rounded-md p-2 lg:w-32 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                </div>
            </form>
            @endif

            <div class=" bg-gray-100 rounded-lg p-2 my-4 mx-4">
                <table class=" table-auto w-full ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Conteúdo</th>
                            <th>Cor Fundo</th>
                            <th>Imagem</th>
                            <th>Lado da Imagem</th>
                            <th>Tamanho da Imagem</th>
                            <th>Padding X</th>
                            <th>Padding Y</th>
                            <th>Menu</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginas as $item)
                        <tr class=" text-center bg-white">
                            <td class="p-2 ">{{ $item->id }}</td>
                            <td class="p-2 ">{{ substr($item->conteudo, 0, 100) }}...</td>
                            <td class="p-2 ">{!! $item->cor_fundo !!}</td>
                            <td class="p-2 ">{{ $item->imagem }}</td>
                            <td class="p-2 ">{{ $item->lado_imagem }}</td>
                            <td class="p-2 ">{{ $item::retornaTamanho($item->tamanho_imagem) }}</td>
                            <td class="p-2 ">{{ $item->padding_x }}</td>
                            <td class="p-2 ">{{ $item->padding_y }}</td>
                            <td class="p-2 ">{{ $item->menu->menu ?? '' }}</td>
                            <td class="p-2 ">
                                <button wire:click="editar({{ $item->id }})" class=" text-blue-600 rounded-lg font-semibold"><i class="fa-solid fa-file-pen"></i></button>
                                <button wire:click="apagar({{ $item->id }})" class=" text-red-600 rounded-lg font-semibold"><i class="fa-solid fa-trash-can"></i></button>
                                <a href="{{ route('sistema.setup.pagina', [$item->menu->menu,  $item->id] ) }}"><i class="fa-solid fa-link"></i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>            

        </div>       

        <livewire:sistema.componente.site-view :menu="$menu" :pagina="$pagina" />

    </div>

    @if(!empty($paginaEditAtivo))
    <div class="absolute left-0 top-0 right-0 bottom-0 bg-black/80 z-50">
        <div class=" mx-20 bg-white mt-20 rounded-lg p-5">
            <form class="grid lg:grid-cols-4 lg:gap-4 mt-16 px-5">               

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Cor de Fundo</label>
                    <input type="color" name="cor_fundo" value="{{ $paginaEdit->cor_fundo }}" wire:model.defer="cor_fundo" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Cor de Fundo">
                    @error('cor_fundo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Imagem</label>
                    <input type="file" name="imagem" value="{{ $paginaEdit->imagem }}" wire:model.defer="imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Descrição">
                    @error('imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Lado da Imagem</label>
                    <input type="text" name="cor_fundo" value="{{ $paginaEdit->cor_fundo }}" wire:model.defer="lado_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Lado da Imagem">
                    @error('lado_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Tamanho da Imagem</label>
                    <select name="tamanho_imagem" value="{{ $paginaEdit->tamanho_imagem }}" wire:model.defer="tamanho_imagem" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                        <option class="0" selected>-- Selcione o tamanho --</option>
                        <option value="1" class="">Pequena</option>
                        <option value="2" class="">Média</option>
                        <option value="3" class="">Grande</option>
                    </select>
                    @error('tamanho_imagem') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Adicionar Form. de Contat?</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="form_contato" wire:model="form_contato"><span> Sim</span>
                        <input type="radio" value="0" name="form_contato" wire:model="form_contato"><span> Não</span>
                    </div>                   
                    @error('form_contato') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Adicionar Blog?</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="blog" wire:model="blog"><span> Sim</span>
                        <input type="radio" value="0" name="blog" wire:model="blog"><span> Não</span>
                    </div>                   
                    @error('blog') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Blog Resumido?</label>
                    <div class=" text-gray-500 pt-4">
                        <input type="radio" value="1" name="mostrar_blog_resumo" wire:model="mostrar_blog_resumo"><span> Sim</span>
                        <input type="radio" value="0" name="mostrar_blog_resumo" wire:model="mostrar_blog_resumo"><span> Não</span>
                    </div>                   
                    @error('mostrar_blog_resumo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Galeria</label>
                    <select name="galerias_id" wire:model.defer="galerias_id" class=" border rounded-md p-2 focus:outline-none block w-full h-14">
                        <option class="0" selected>-- Selcione a Galeria --</option>
                        @foreach ($galerias as $item)
                        <option value="{{ $item->id }}" class="">{{ $item->galeria }}</option>
                        @endforeach
                    </select>
                    @error('galerias_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div> 

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding X</label>
                    <input type="text" value="{{ $paginaEdit->padding_x }}" name="padding_x" wire:model.defer="padding_x" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding X">
                    @error('padding_x') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Padding Y</label>
                    <input type="text" value="{{ $paginaEdit->padding_y }}" name="padding_y" wire:model.defer="padding_y" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Padding Y">
                    @error('padding_y') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4 lg:col-span-4">
                    <label for="" class=" text-sm font-semibold text-gray-600">Conteúdo</label>
                    <textarea wire:model.defer="conteudo" class=" h-48 border rounded-md p-2 focus:outline-none block w-full" placeholder="Conteúdo">{!! $paginaEdit->conteudo !!}</textarea >
                    @error('conteudo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror                    
                </div>
                      
                <div class="mt-4 lg:col-span-4">
                    <button wire:click="update()" class=" border inline-block rounded-md p-2 lg:w-32 focus:outline-none w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Salvar</button>
                    <button wire:click="fechaEdit()" class=" border inline-block rounded-md p-2 lg:w-32 focus:outline-none w-full h-14 bg-red-600 text-white font-semibold hover:bg-red-700"><i class="fa-solid fa-door-open"></i> Sair</button>

                </div>
            </form>
        </div>
    </div>
    @endif

</div>
