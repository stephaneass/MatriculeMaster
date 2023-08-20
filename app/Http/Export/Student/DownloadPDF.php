<?php
namespace App\Http\Export\Student;

use App\Models\Cycle;
use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class DownloadPDF
{
    public $title = 'Liste de tous les Etudiants';
    
    public function __construct(public $search, public $cycle_id = null, public $gender = null)
    {
        $this->formatTitle();
    }
    
    public function formatTitle()
    {
        if (!blank($this->gender)){
            $gender_label = ($this->gender == "F") ? " Feminins " : " Masculins ";
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
            "students" => User::role('student')->list($this->search, $this->cycle_id, $this->gender)->get(),
            'columns' => $this->columns(),
            'title' => $this->title,
            'export'=>true,
        ];
    }

    public function downloadPDF() {
        $pdf = PDF::loadView('exports.students.pdf', ($this->dataToView()))
                    ->setOption('footer-html', view('exports.footer'));
        
        return $pdf->download($this->title.".pdf");
    }


}