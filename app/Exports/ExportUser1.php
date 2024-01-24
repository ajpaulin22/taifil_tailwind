<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

// class ExportUser implements WithEvents
// {
   
//     protected $id;
//     function __construct($id) {
//         $this->id = explode(',', $id["IDs"]);
//     }

//     public function registerEvents(): array
//     {
//         return [
//             BeforeWriting::class => function(BeforeWriting $event) {
//                 $templateFile = new LocalTemporaryFile(storage_path('template')."\\ApplicantExport.xlsx");
//                 $event->writer->reopen($templateFile, Excel::XLSX);
//                 $event->writer->removeSheetByIndex(0);

//                 $sql = "call export_personal()";
//                 $data = collect(DB::select(DB::raw($sql)))->whereIN("id", $this->id)->values()->all();
                
//                 for ($sheetIndex = 0; $sheetIndex < COUNT($data); $sheetIndex++)
//                 {
//                     $personalid = $data[$sheetIndex]->id;
//                     $event->writer->addNewSheet();
//                     $sheet = $event->writer->getSheetByIndex($sheetIndex);
//                     $sheet->setCellValue("A1", $data[0]->first_name);
//                     $sheet->setTitle($data[0]->last_name . ', '. $data[0]->first_name);






//                     $event->writer->getSheetByIndex($sheetIndex)->export($event->getConcernable());
//                 }
//                 // $sheet = $event->writer->getSheetByIndex($getSheetByIndex);
//                 // $event->writer->getSheetByIndex($getSheetByIndex)->export($event->getConcernable()); // call the export on the first sheet
//                 // return $event->getWriter()->getSheetByIndex($getSheetByIndex);
//             },
//         ];
//     }
// }



