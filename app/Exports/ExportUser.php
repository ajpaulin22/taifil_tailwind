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

    protected $id;
    function __construct($id) {
        $this->id = explode(',', $id["IDs"]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sql = "call biodata_getdata('','','',0,0,'','Name','asc',0,100,'')";
        $data = collect(DB::select(DB::raw($sql)))->whereIN("ID", $this->id)->values()->all();
        $data = collect($data);
        $data->transform(function($i) {
            unset($i->ID);
            return $i;
        });

        if(COUNT($data) != 0){
            for($i = 0; $i < COUNT($data); $i++){
                if($data[$i]->AbroadDate != null){
                    $data[$i]->AbroadDate = date('d/m/Y',strtotime($data[$i]->AbroadDate));
                }
            }
        }

        return $data;
    }

    public function headings(): array
    {
        return[
            'Date of Submission',
            'Name',
            'Job Category',
            'Job Operation',
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
            'L',
        ];
    }
}