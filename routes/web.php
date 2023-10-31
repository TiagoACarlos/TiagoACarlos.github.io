<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  function(){
    return redirect("/site");
})->name("site");

Route::get('/site/{menu?}/{id?}',  \App\Http\Livewire\Site\Home::class)->name("site.home");
Route::get('/sistema/login',  \App\Http\Livewire\Sistema\Login\Login::class)->name("login");


Route::middleware(['auth'])->group(function (){

    //Route::get('/termos', \App\Http\Livewire\Termo\Termo::class)->name('termos');
    //Route::get('/acesso-invalido', \App\Http\Livewire\AcessoInvalido::class)->name('acesso-invalido');
    //Route::get('/usuarios/foto/{id}', [\App\Http\Controllers\ImagemController::class, 'exibeFotoStoreUser'])->name("usuarios.fotos");
    //Route::get('/sistemas/icone/{id}', [\App\Http\Controllers\ImagemController::class, 'exibeIconeSistema'])->name("sistemas.icones");

    Route::get('/sistema/setup/configuracao',  \App\Http\Livewire\Sistema\Configuracao\Update::class)->name("sistema.setup.configuracao");
    Route::get('/sistema/setup/menu',  \App\Http\Livewire\Sistema\Menu\Home::class)->name("sistema.setup.menu");
    Route::get('/sistema/setup/cadastro-menus',  \App\Http\Livewire\Sistema\Menu\Cadastro::class)->name("sistema.setup.cadastro-menus");
    Route::get('/sistema/setup/footer',  \App\Http\Livewire\Sistema\Footer\Footer::class)->name("sistema.setup.footer");
    Route::get('/sistema/setup/rede-social',  \App\Http\Livewire\Sistema\RedeSocial\Cadastro::class)->name("sistema.setup.rede-social");
    Route::get('/sistema/setup/banner',  \App\Http\Livewire\Sistema\Banner\Banner::class)->name("sistema.setup.banner");
    Route::get('/sistema/setup/pagina/{menu?}/{pagina?}',  \App\Http\Livewire\Sistema\Pagina\Pagina::class)->name("sistema.setup.pagina");
    Route::get('/sistema/setup/contato',  \App\Http\Livewire\Sistema\Contato\FormContato::class)->name("sistema.setup.contato");
    Route::get('/sistema/setup/galeria/{id?}',  \App\Http\Livewire\Sistema\Galeria\Cadastro::class)->name("sistema.setup.galeria");
    Route::get('/sistema/setup/galeria/update/{id}',  \App\Http\Livewire\Sistema\Galeria\Update::class)->name("sistema.setup.galeria.update");

    Route::get('/sistema/setup/blog/update',  \App\Http\Livewire\Sistema\Blog\Update::class)->name("sistema.setup.blog.update");

    /** LOGOUT */
    Route::get('/logout', function(){
        Auth::logout();
        \Session::flush();
        return redirect("/login");
    })->name('logout');
});
