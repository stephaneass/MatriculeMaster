<?php
namespace App\Http\Export\Student;

use App\Models\Cycle;
use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class DownloadPDF
{
    use CommunData;

    public function downloadPDF() {
        $pdf = PDF::loadView('exports.students.pdf', ($this->dataToView()))
                    ->setOption('header-html', view('exports.header'))
                    ->setOption('footer-html', view('exports.footer'));
        
        return $pdf->download($this->title.".pdf");
    }


}