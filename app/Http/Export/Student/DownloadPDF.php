<?php
namespace App\Http\Export\Student;

use App\Models\Cycle;
use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class DownloadPDF
{
    use CommunData;

    public function downloadPDF($title) {
        $pdf = PDF::loadView('exports.students.pdf', ($this->dataToView()))
                    ->setOption('footer-html', view('exports.footer'));
        
        return $pdf->download($title.".pdf");
    }


}