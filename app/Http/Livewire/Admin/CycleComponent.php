<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cycle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        "data.label"=>"required|min:2|max:40|unique:cycles,label",
        "data.description"=>"required|min:3|max:255",
        "data.format"=>"required|max:40",
    ];

    protected $messages = [
        "unique"=>"Ce libellé n'est plus disponible.",
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
            ->extends('layout', ['title' => 'Cycles']);
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
        try {
            $this->data = array_merge($this->data, ['admin_id' => $this->admin_id]);

            $result = Cycle::checkIfFormatIsValide($this->data['format'], $this->data['label']);
            if (!$result) {
                $this->addError('data.format', "Veuillez renseigner un format valide. <br/> Le format peut contenir tout carctère et des valiables telles que : <br/> {YEAR}{MONTH}{DAY}{TC}{CC}<br/> Seul le BTS peut contenir {G} <br/> Seul la Licence peut contenir {FN} {LN}.");
                return;
            }

            Cycle::create($this->data);

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
                $result = Cycle::checkIfFormatIsValide($this->data['format'], $this->data['label']);
                if (!$result) {
                    $this->addError('data.format', "Veuillez renseigner un format valide. <br/> Le format peut contenir tout carctère et des valiables telles que : <br/> {YEAR}{MONTH}{DAY}{TC}{CC}<br/> Seul le BTS peut contenir {G} <br/> Seul la Licence peut contenir {FN} {LN}.");
                    return;
                }
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
