<?php

namespace App\Exports;

use App\Models\patient;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPatients implements FromCollection
{
    public function collection()
    {
        return patient::all();
    }
      
        
}