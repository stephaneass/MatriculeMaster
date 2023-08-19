<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cycle;
use App\Models\User;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $colors = [
        'primary',
        'info',
        'success',
        'Warning',
        'Secondary',
    ];

    public function render()
    {
        return view('livewire.admin.dashboard',[
            'users_dash' => $this->getUserDash(),
            'cycles_dash' => $this->getCycleDash(),
            //'operations_dash' => $this->getOperationDash(),
        ])
            ->extends('layout');
    }

    function getUserDash()
    {
        return [
            [
                'title' => 'Féminin',
                'number' => User::role('student')->whereGender('F')->count(),
                'color' => 'primary'
            ],
            [
                'title' => 'Masculin',
                'number' => User::role('student')->whereGender('M')->count(),
                'color' => 'info'
            ],
            
        ];
    }
    
    function getCycleDash()
    {
        $cycles = Cycle::withCount('students')->get();
        $data = [];

        $currentIndex = 0;
        foreach ($cycles as $cycle) {
            $currentIndex = $currentIndex % count($this->colors);
            $data[] = [
                'title' => $cycle->label,
                'number' => $cycle->students_count,
                'color' => $this->colors[$currentIndex]
            ];
            $currentIndex++;
        }
        return $data;
    }
}