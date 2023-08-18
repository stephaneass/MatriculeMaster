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
    public $search = '';

    public $admin_id;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        "data.label"=>"required|min:3|max:40",
        "data.description"=>"required|min:3|max:255",
        "data.format"=>"required|max:40",
    ];

    protected $messages = [
        "required"=>"Ce champ est obligatoire.",
        "min"=>"Au moin 3 caractères.",
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

    public function addCycle()
    {
        $this->validate();

        $this->data = array_merge($this->data, ['admin_id' => $this->admin_id]);

        Cycle::create($this->data);

        $this->data = [];

        $this->emit('hideAddCycleModal');
    }
}
