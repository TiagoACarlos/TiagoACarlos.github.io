<?php

namespace App\Http\Livewire\Sistema\Login;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $erroLogin = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:3',
    ];
    
    protected $messages = [
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'E-mail inválido.',
        'password.required' => 'O campo senha é obrigatório.',
        'password.min' => 'O campo senha precisa ter mais de 3 caracteres.',
    ];

    public function mount(){

        if(!empty(Auth::user()->id))
            return redirect()->route('sistema.setup.menu');            

    }

    public function render()
    {
        return view('livewire.sistema.login.login');
    }

    public function login()
    {
        $this->validate();

        $credentials = ["email" => $this->email, "password" => $this->password];

        if (Auth::attempt($credentials)) {            
            return redirect()->route('sistema.setup.menu');            
        } else {
            $this->erroLogin = "Login ou senha inválida";
        }
        
    }

}
