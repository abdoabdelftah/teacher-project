<?php



namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResultsExport implements FromView
{

    public function __construct($examname) {
        $this->examname = $examname;
    }
    
  
    public function view(): View
    {
        return view('admin.downloadunitsectionanswered',[
            'examname' => $this->examname
        ]);
    }
}