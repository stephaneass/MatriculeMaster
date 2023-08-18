<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cycle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CycleComponent extends Component
{
    use WithPagination;
    
    public $title = "Liste de tous les cycles";
    public $data = [];
    public $model = null;
    public $search = '';

    public $modalTitle = '';
    public $buttonTitle = 'Ajouter';
    public $buttonAction = 'save';

    public $admin_id;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        "data.label"=>"required|min:2|max:40",
        "data.description"=>"required|min:3|max:255",
        "data.format"=>"required|max:40",
    ];

    protected $messages = [
        "required"=>"Ce champ est obligatoire.",
        "data.label.min"=>"Au moin 2 caractères.",
        "data.description.min"=>"Au moin 3 caractères.",
        "data.label.max"=>"Au plus 40 caractères.",
        "data.description.max"=>"Au plus 255 caractères.",
        "data.format.max"=>"Au plus 40 caractères.",
    ];

    public function mount()
    {
        $this->admin_id = Auth::id();
    }

    public function render()
    {
        return view('livewire.admin.cycles.table',[
                'cycles' => Cycle::list($this->search)->paginate(10)
            ])
            ->extends('layout');
    }

    function getColumnsProperty()
    {
        return [
            "N°",
            "Libellé",
            "Description",
            "Format",
            "Action",
        ];
    }

    public function save()
    {
        $this->validate();

        $this->data = array_merge($this->data, ['admin_id' => $this->admin_id]);

        Cycle::create($this->data);

        session()->flash('success', "Le cycle vient d'être ajouté avec succès.");
        $this->data = [];

        $this->emit('hideAddCycleModal');
    }

    public function edit($id)
    {
        $this->model = Cycle::find($id);
        $this->data['label'] = $this->model->label;
        $this->data['description'] = $this->model->description;
        $this->data['format'] = $this->model->format;
    }
}
