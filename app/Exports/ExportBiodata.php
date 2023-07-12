<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Files\LocalTemporaryFile;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ExportBiodata implements WithEvents, WithDrawings
{
    protected $id;
    protected $data;
    function __construct($id) {
        
        $this->id = $id["IDs"];
        $sql = "call biodata_getdata('','','','',0,0)";
        $this->data = collect(DB::select(DB::raw($sql)))->where("ID", $this->id);
        // dd($data[0]->ID);
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function registerEvents(): array
    {
        return [
            BeforeWriting::class => function(BeforeWriting $event) {
                $templateFile = new LocalTemporaryFile(storage_path('template\TestExport.xlsx'));
                $event->writer->reopen($templateFile, \Maatwebsite\Excel\Excel::XLSX);
                $sheet = $event->writer->getSheetByIndex(0);

                $this->populateSheet($sheet);
                // $this->drawing($sheet);
                
                $event->writer->getSheetByIndex(0)->export($event->getConcernable()); // call the export on the first sheet
                return $event->getWriter()->getSheetByIndex(0);
            },
        ];
    }
    
    private function populateSheet($sheet){

        // Populate the static cells
        // $sheet->setCellValue('D6', $this->va);
        // $sheet->setCellValue('D11', $this->vb);
        // $sheet->setCellValue('D16', $this->vc);   

    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('\storage\1x1_pictures\lisa.jpg'));
        $drawing->setWidthAndHeight(200, 200);
        $drawing->setCoordinates('R2');
        return $drawing;
    }
}
