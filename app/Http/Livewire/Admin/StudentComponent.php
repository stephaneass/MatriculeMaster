<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cycle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class StudentComponent extends Component
{
    use WithPagination;
    
    public $title = "Liste de tous les étudiants";
    public $data = [];
    public $model = null;
    public $search = '';

    public $modalTitle = '';
    public $buttonTitle = 'Ajouter';
    public $buttonAction = 'save';

    public $admin_id;
    public $cycles = [];

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        "data.last_name"=>"required|min:2|max:60",
        "data.first_name"=>"required|min:2|max:60",
        "data.gender"=>"required|min:1|max:1",
        "data.birth_date"=>"required|date|before:today",
        "data.registration_date"=>"required|date|before:tomorrow",
        "data.cycle_id"=>"required|integer|exists:cycles,id",
    ];

    protected $messages = [
        "exists"=>"Choisissez un cycle valide.",
        "required"=>"Ce champ est obligatoire.",
        "date"=>"Ce champ doit être une date.",
        "data.last_name.min"=>"Au moin 2 caractères.",
        "data.first_name.min"=>"Au moin 2 caractères.",
        "data.gender.min"=>"Au moin 1 caractère.",
        "data.last_name.max"=>"Au plus 60 caractères.",
        "data.first_name.max"=>"Au plus 60 caractères.",
        "data.gender.max"=>"Au plus 1 caractère.",
        "data.birth_date.before"=>"La date de naissance doit être inférieure à la date d'aujourd'hui.",
        "data.registration_date.before"=>"La date d'enregistration doit être inférieure ou égale à la date d'aujourd'hui.",
    ];

    public function mount()
    {
        $this->admin_id = Auth::id();
        $this->cycles = (Cycle::orderBy('label')->pluck('label', 'id')->toArray());
    }

    public function render()
    {
        return view('livewire.admin.students.table',[
                
                'students' => User::role('student')->list($this->search)->paginate(10)
            ])
            ->extends('layout');
    }

    function getColumnsProperty()
    {
        return [
            "N° Matricule",
            "Nom",
            "Prénoms",
            "Genre",
            "Date de Naissance",
            "Date d'enregistrement",
            "Action",
        ];
    }

    public function save()
    {
        $this->validate();
        try {
            $this->data = array_merge($this->data, ['admin_id' => $this->admin_id]);

            User::createNew($this->data, 'student');

            $this->data = [];

            $this->dispatchBrowserEvent('hideAddCycleModal',[
                'message' => "Enregistrement effectué avec succès.",
                'color' => 'success'
            ]);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            $this->dispatchBrowserEvent('hideAddCycleModal', [
                'message' => "Une erreur s'est produite.",
                'color' => 'danger'
            ]);
        }
    }

    public function edit($id)
    {
        $this->model = Cycle::find($id);
        $this->data['label'] = $this->model->label;
        $this->data['description'] = $this->model->description;
        $this->data['format'] = $this->model->format;
    }

    public function update()
    {
        $this->validate([
            "data.label"=>"required|min:2|max:40|unique:cycles,label,".$this->model->id,
            "data.description"=>"required|min:3|max:255",
            "data.format"=>"required|max:40",
        ]);

        try {
            if (!blank($this->model)) {
                $this->model->label = $this->data['label'];
                $this->model->description = $this->data['description'];
                $this->model->format = $this->data['format'];
                $this->model->save();
            }

            $this->data = [];

            $this->dispatchBrowserEvent('hideAddCycleModal',[
                'message' => "Modification effectuée avec succès.",
                'color' => 'success'
            ]);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            $this->dispatchBrowserEvent('hideAddCycleModal', [
                'message' => "Une erreur s'est produite.",
                'color' => 'danger'
            ]);
        }
    }
}
