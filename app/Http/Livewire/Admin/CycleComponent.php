<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CycleComponent extends Component
{
    public $title = "Liste de tous les cycles";

    public function render()
    {
        return view('livewire.admin.cycle-component')
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
}
