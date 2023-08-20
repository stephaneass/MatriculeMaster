<?php
namespace App\Http\Export\Student;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;

class DownloadExcel implements FromView, ShouldAutoSize
{
    use Exportable, CommunData;

    public function view(): View
    {
        return view('exports.students.excel', [
            "students" => User::role('student')->list($this->search, $this->cycle_id, $this->gender)->get(),
            'columns' => $this->columns(),
            'title' => $this->title,
            'export'=>true,
            //$this->dataToView()
        ]);
    }


}