<?php

namespace App\Http\Livewire\Admin;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfilComponent extends Component
{
    public $data, $user, $password;

    protected $rules = [
        "data.email"=>"required|email", // manual validation |unique:users,email
        "data.last_name"=>"required",
        "data.first_name"=>"required",
        "data.gender"=>"required|min:1|max:1",
    ];

    protected $messages = [
        "required"=>"Ce champ est obligatoire.",
        "data.email.unique"=>"Ce email n'est plus disponible.",
        "email"=>"Renseignez un email valide.",
        "data.gender.min"=>"Au moin 1 caractère.",
        "data.gender.max"=>"Au plus 1 caractère.",
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->data = [
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'gender' => $this->user->gender,
            'email' => $this->user->email,
        ];
    }

    public function render()
    {
        return view('livewire.admin.profil')
                ->extends('layout');
    }

    public function update()
    {
        $this->validate();
        
        $user = User::where('email', $this->data['email'])->first();
        if (!blank($user)) {
            $this->addError('email', "Cet adresse mail est déjà pris.");
        }

        $this->user->update([
            'email' => $this->data['email'],
            'gender' => $this->data['gender'],
            'first_name' => $this->data['first_name'],
            'last_name' => $this->data['last_name'],
        ]);

        //session()->flash('success', 'Modification effectuée avec succès.');
        $this->dispatchBrowserEvent('showNotification',[
            'message' => "Modification effectuée avec succès.",
            'color' => 'success'
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'password.old' => 'required',
            'password.new' => 'required',
            'password.confirm' => 'required',
        ], [
            'required' => 'Ce champ est obligatoire'
        ]);

        $check = Hash::check($this->password['old'], $this->user->password);
        if ($check == true) {
            if ($this->password['new'] == $this->password['confirm']) {

                $this->user->password = bcrypt($this->password['new']);
                $this->user->save();
                //session()->flash('success', 'Mot de Passe modifié avec succès.');
                $this->dispatchBrowserEvent('showNotification',[
                    'message' => "Mot de Passe modifié avec succès.",
                    'color' => 'success'
                ]);
            } else {
                $this->addError('password.new', "Mot de passe non confirme.");
                session()->flash('error', 'Mot de passe non confirme.');
            }
        } else {
            $this->addError('password.old', "Mot de passe incorrect.");
            session()->flash('error', 'Mot de passe incorrect.');
        }
    }
}
