<?php
namespace App\Http\Export\Student;

use App\Models\Cycle;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class DownloadPDF
{
    public $title = 'Liste de tous les etudiants';
    
    public function __construct(public $search, public $cycle_id = null, public $gender = null)
    {
        $this->formatTitle();
    }
    
    public function formatTitle()
    {
        if (!blank($this->gender)){
            $gender_label = ($$this->gender == "F") ? " Feminins " : " Masculins ";
            $this->title .= $gender_label;
        }
        if (!blank($this->cycle_id)){
            $cycle = Cycle::findOrFail($this->cycle_id)->label;
            $this->title .= " du cycle $cycle";
        }
    }

    public function columns()
    {
        return [
            "N° Matricule",
            "Nom",
            "Prénoms",
            "Genre",
            "Cycle",
            "Date de Naissance",
            "Date d'enregistrement",
        ];
    }

    public function dataToView()
    {
        return [
            "datas" => User::role('student')->list($this->search, $this->cycle_id, $this->gender)->get(),
        ];
    }

    public function downloadPDF($filename) {
        $pdf = PDF::loadView('exports.students.pdf', $this->dataToView());
        
        return $pdf->download($filename);
    }


}