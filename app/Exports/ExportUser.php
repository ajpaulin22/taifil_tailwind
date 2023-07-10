<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportUser implements FromCollection, WithHeadings, ShouldAutoSize
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

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension()->setAutoSize(true);
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',

                        
        ];
    }
}
