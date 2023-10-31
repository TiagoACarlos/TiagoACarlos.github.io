<div class=" rounded-md border p-5 mx-auto w-10/12 lg:w-2/6 mt-40 shadow-lg">
        <h3 class="text-center font-semibold text-gray-600">Painel de Controle</h3>
        <form wire:submit.prevent="login">
                <div class="mt-4">
                        <input type="text" name="login" wire:model="email" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Login">
                        @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                        <input name="password" type="password" wire:model="password" class=" border rounded-md p-2 focus:outline-none block w-full h-14" placeholder="Senha">
                        @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>        
                @if(!empty($erroLogin)) <span class="text-red-400 text-sm text-center p-2 block">{{ $erroLogin }}</span> @endif
                <div class="mt-4">
                        <button type="submit" class=" border rounded-md p-2 focus:outline-none block w-full h-14 bg-blue-600 text-white font-semibold hover:bg-blue-700">Login</button>
                </div>
        </form>
        <div class="mt-8 text-gray-500 text-sm font-semibold text-center">
                <p>© 2023 Vennx - Todos os direitos reservados</p>
        </div>
</div>
