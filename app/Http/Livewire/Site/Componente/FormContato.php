<?php

namespace App\Http\Livewire\Site\Componente;

use App\Models\Contato;
use Livewire\Component;
use App\Models\RedeSocial;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormContato extends Component
{
    public $nome = '';
    public $email = '';
    public $telefone = '';
    public $assunto = '';
    public $conteudo = '';
    public $msgFail = '';
    public $msgSucess = '';

    public function render()
    {
        $contato = Contato::first();
        $redes = RedeSocial::get();
        return view('livewire.site.componente.form-contato', ['contato' => $contato, 'redes' => $redes ]);
    }

    public function sendMail()
    {

        $validator = Validator::make(
            [
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->telefone,
                'assunto' => $this->assunto,
                'conteudo' => $this->conteudo,
            ],
            [
                'nome' => 'required|string|min:2',
                'email' => 'required|email',
                'telefone' => 'required|string|min:8',
                'assunto' => 'required|string|min:6',
                'conteudo' => 'required|string|min:8',
            ],
            [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O campo :attribute deve ser uma string.',
                'min' => [
                    'string' => 'O campo :attribute não pode ter menos que :min caracteres.',
                ],
                'email' => 'O campo :attribute deve ser um e-mail.',
            ]
        );

        if ($validator->fails()) {
            $this->addError('nome', $validator->errors()->first('nome'));
            $this->addError('email', $validator->errors()->first('email'));
            $this->addError('telefone', $validator->errors()->first('telefone'));
            $this->addError('assunto', $validator->errors()->first('assunto'));
            $this->addError('conteudo', $validator->errors()->first('conteudo'));
            return;
        }

        $contato = Contato::first();
        $destino =  $contato->email_destino;
        $assunto = $this->assunto;

        $conteudo = "Nome: ".$this->nome ."<br>";
        $conteudo .= "E-mail: ".$this->email ."<br>";
        $conteudo .= "Telefone: ".$this->telefone ."<br>";
        $conteudo .= "Assunto: ".$this->assunto ."<br>";
        $conteudo .= "Mensagem: ".$this->conteudo ."<br>";

        try {
            Mail::send("email-templates.contato", ["conteudo" => $conteudo], function ($message) use ($destino, $assunto) {
                $message->from(env('MAIL_USERNAME'), 'Vennx Cyber Suite');
                $message->to($destino);
                $message->subject($assunto);
            });

            $this->msgSucess = 'E-mail enviado com suecsso.';
            $this->msgFail = '';

            $this->nome = '';
            $this->email = '';
            $this->telefone = '';
            $this->assunto = '';
            $this->conteudo = '';

        } catch (\Exception $e) {
            $this->msgSucess = '';
            $this->msgFail = 'Erro ao tentar enviar o e-mail, tente novamente.';
        }
    }

}
