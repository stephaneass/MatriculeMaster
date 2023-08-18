<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'required' => 'Ce champ est obligatoire',
        'email' => 'Renseignez un email valide'
    ];

    public function render()
    {
        return view('livewire.admin.login-component')
        ->extends('auth.layout');
    }

    public function login()
    {
        $this->validate();

        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            $user = Auth::user();
            if ($user->isAdmin()) {
                session()->flash('message', "Vous êtes connecté avec succès!.");
                return redirect()->route("admin.dashboard");
            }
            Auth::logout();
            session()->flash('error', "Vous n'êtes pas autorisés.");
            
        }else{
            session()->flash('error', 'Email ou mot de passe invalide.');
        }
    }
}
