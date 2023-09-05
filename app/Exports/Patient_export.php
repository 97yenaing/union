<?php

namespace App\Exports;




//use Maatwebsite\Excel\Concerns\FromQuery;

use Maatwebsite\Excel\Concerns\Exportable;
//use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class Patient_export implements FromView
{   private $export_data;
    public function __construct($export_data)
    {
         $this->$export_data = $export_data;
    }
    public function view(): View
    {
        $export_data = $this->$export_data;
        return view('Patients.Export.patientExport', [
            'users' => $users,
        ]);
    }

}