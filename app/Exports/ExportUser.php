<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sql = "call biodata_getdata('','','','',0,0)";
        $data = collect(DB::select(DB::raw($sql)));
        return $data;
    }

    public function headings(): array
    {
        return[
            'ID',
            'Name',
            'Job Category',
            'Job Type',
            'Attended Interview',
            'Interview Date',
            'Interview Count',
            'Company',
            'Age',
            'To Abroad',
            'Abroad Date'
        ];
    }
}
