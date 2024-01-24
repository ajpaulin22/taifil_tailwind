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
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Files\LocalTemporaryFile;


class ExportUser implements WithMultipleSheets
{
   
    protected $id;
    function __construct($id) {
        $this->id = explode(',', $id["IDs"]);
    }

    public function sheets(): array
    {
        return [
            "Work Sheet 1" => new PersonalSheetExport($this->id),
            "Work Sheet 2" => new EducationalSheetExport($this->id),
            "Work Sheet 3" => new VocationalSheetExport($this->id),
            "Work Sheet 4" => new LocalSheetExport($this->id),
            "Work Sheet 5" => new AbroadSheetExport($this->id),
            "Work Sheet 6" => new FamilySheetExport($this->id),
            "Work Sheet 7" => new SiblingSheetExport($this->id),
            "Work Sheet 8" => new JapanVisitSheetExport($this->id),
            "Work Sheet 9" => new RelativeSheetExport($this->id),
            "Work Sheet 10" => new CertificateSheetExport($this->id),
            "Work Sheet 11" => new PrometricSheetExport($this->id),
            "Work Sheet 12" => new JapanLanguageSheetExport($this->id)
        ];
    }


  

    /**
    * @return \Illuminate\Support\Collection
    */

    // public function collection()
    // {
    //     $sql = "call biodata_getdata('','','',0,0,'','Name','asc',0,100,'')";
    //     $data = collect(DB::select(DB::raw($sql)))->values()->all();
    //     $data = collect($data);
    //     $data->transform(function($i) {
    //         unset($i->ID);
    //         return $i;
    //     });

    //     if(COUNT($data) != 0){
    //         for($i = 0; $i < COUNT($data); $i++){
    //             if($data[$i]->AbroadDate != null){
    //                 $data[$i]->AbroadDate = date('d/m/Y',strtotime($data[$i]->AbroadDate));
    //             }
    //         }
    //     }
    //     return $data;
    // }

    // public function headings(): array
    // {
    //     return[
    //         'Date of Submission',
    //         'Name',
    //         'Job Category',
    //         'Job Operation',
    //         'Job Type',
    //         'Attended Interview',
    //         'Interview Date',
    //         'Interview Count',
    //         'Company',
    //         'Age',
    //         'To Abroad',
    //         'Abroad Date'
    //     ];
    // }

    // public function columnWidths(): array
    // {
    //     return [
    //         'A',
    //         'B',
    //         'C',
    //         'D',
    //         'E',
    //         'F',
    //         'G',
    //         'H',
    //         'I',
    //         'J',
    //         'K',
    //         'L',
    //     ];
    // }
}

// class PersonalSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle
// {
//     protected $id;
//     function __construct($id) {
//         $this->id = $id;
//     }
    
//     public function title(): string
//     {
//         return "Work Sheet 1";
//     }

//     public function collection()
//     {
//         $sql = "call biodata_getdata('','','',0,0,'','Name','asc',0,100,'')";
//         $data = collect(DB::select(DB::raw($sql)))->values()->all();
//         $data = collect($data);
//         $data->transform(function($i) {
//             unset($i->ID);
//             return $i;
//         });

//         if(COUNT($data) != 0){
//             for($i = 0; $i < COUNT($data); $i++){
//                 if($data[$i]->AbroadDate != null){
//                     $data[$i]->AbroadDate = date('d/m/Y',strtotime($data[$i]->AbroadDate));
//                 }
//             }
//         }
//         return $data;
//     }

//     public function headings(): array
//     {
//         return[
//             'Date of Submission',
//             'Name',
//             'Job Category',
//             'Job Operation',
//             'Job Type',
//             'Attended Interview',
//             'Interview Date',
//             'Interview Count',
//             'Company',
//             'Age',
//             'To Abroad',
//             'Abroad Date'
//         ];
//     }
//     public function columnWidths(): array
//     {
//         return [
//             'A',
//             'B',
//             'C',
//             'D',
//             'E',
//             'F',
//             'G',
//             'H',
//             'I',
//             'J',
//             'K',
//             'L',
//         ];
//     }

// }

class PersonalSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Personal Table";
    }

    public function collection()
    {
        $sql = "call export_personal()";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        
        return $data;
    }

    public function headings(): array
    {
        return[
            'ID',
            'Job Type', 
            'Job Category', 
            'Job Operation', 
            'Submission Date', 
            'Last Name', 
            'First Name', 
            'Middle Name', 
            'Nickname', 
            'Date of Birth', 
            'Place of Birth', 
            'Gender', 
            'Citizenship', 
            'Age', 
            'Blood Type', 
            'Civil Status', 
            'Contact', 
            'Height', 
            'Religion', 
            'Facebook', 
            'Smoking', 
            'Weight', 
            'Read JP', 
            'Write JP', 
            'Speak JP', 
            'Listen JP', 
            'Other Language', 
            'Shoe Size', 
            'Hobbies', 
            'Person to Notify', 
            'Relation', 
            'Others', 
            'Address', 
            'Contact', 
            'Passport No', 
            'Issue Date', 
            'Expiration Date', 
            'Issue Place', 
            'Has Allergy', 
            'Food',
            'Has Tattoo', 
            "Has Driver's License", 
            'Type', 
            'Valid Until', 
            'Sent to Abroad', 
            'Date', 
            'Permanent Address'
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
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
            'AA',
            'AB',
            'AC',
            'AD',
            'AE',
            'AF',
            'AG',
            'AH',
            'AI',
            'AJ',
            'AK',
            'AL',
            'AM',
            'AN',
            'AO',
            'AP',
            'AQ',
            'AR',
            'AS',
            'AT',
            'AU'
           
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:AU1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:AU1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}

class EducationalSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Educational Table";
    }

    public function collection()
    {
        $sql = "call export_educational";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        
        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID",
            "ID",
            "Last Name",
            "First Name",
            "Elementary School",
            "Address",
            "From",
            "To",
            "Highschool",
            "Address",
            "From",
            "To",
            "Japanese School",
            "Address",
            "From",
            "To",
            "Certificate",
            "Date Taken",
            "No. of Hours",
            "College",
            "Address",
            "From",
            "To",
            "Course",
            "Certificate"
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
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:Y1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:Y1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

}

class VocationalSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Vocational Table";
    }

    public function collection()
    {
        $sql = "call export_vocational";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        
        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID",
            "Educational Table ID",
            "ID",
            "Last Name",
            "First Name",
            "School Name",
            "Address",
            "From",
            "To",
            "Course",
            "Certificate",
            "Valid Until"
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
            'L'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:L1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:L1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

}

class LocalSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Local Employment Table";
    }

    public function collection()
    {
        $sql = "call export_local";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        
        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID",
            "ID",
            "Last Name",
            "First Name",
            "Company Name",
            "Position",
            "Address",
            "From",
            "To"
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
            'I'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:I1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:I1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

}

class AbroadSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Abroad Employment Table";
    }

    public function collection()
    {
        $sql = "call export_abroad";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        

        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID",
            "ID",
            "Last Name",
            "First Name",
            "Company Name",
            "Position",
            "Address",
            "From",
            "To"
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
            'I'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:I1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:I1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

}

class FamilySheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Family Table";
    }

    public function collection()
    {
        $sql = "call export_family";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        

        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID"
            ,"ID"
            ,"Last Name"
            ,"First Name"
            ,"father's Name"
            ,"Date of Birth"
            ,"Occupation"
            ,"Contact No."
            ,"Address"
            ,"mother_name"
            ,"mother_birth"
            ,"mother_occupation"
            ,"mother_cp"
            ,"mother_address"
            ,"spouse_name"
            ,"spouse_birth"
            ,"spouse_occupation"
            ,"spouse_cp"
            ,"spouse_address"
            ,"partner_name"
            ,"partner_birthday"
            ,"partner_Occupation"
            ,"partner_cp"
            ,"partner_address"
            ,"went_japan"
            ,"how_many_japan"
            ,"overstay_japan"
            ,"how_long_overstay"
            ,"fake_identity_japan"
            ,"fake_identity_purpose"
            ,"fake_identity_surrender"
            ,"applied_visa"
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
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
            'AA',
            'AB',
            'AC',
            'AD',
            'AE',
            'AF'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:AF1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:AF1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
class SiblingSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Sibling Table";
    }

    public function collection()
    {
        $sql = "call export_sibling";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        

        return $data;
    }

    public function headings(): array
    {
        return[
            "Family Table ID"
            ,"ID"
            ,"Last Name"
            ,"First Name"
            ,"Sibling's Name"
            ,"Date of Birth"
            ,"Occupation"
            ,"Contact No."
            ,"Address"
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
            'I'

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:I1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:I1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

}

class JapanVisitSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Japan Visit Table";
    }

    public function collection()
    {
        $sql = "call export_japanvisit";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        

        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID"
            ,"Family Table ID"
            ,"ID"
            ,"Last Name"
            ,"First Name"
            ,"Place Visited"
            ,"From"
            ,"To"
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
            'G'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:G1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:G1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}

class RelativeSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Relative Table";
    }

    public function collection()
    {
        $sql = "call export_relative";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        

        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID"
            ,"Family Table ID"
            ,"ID"
            ,"Last Name"
            ,"First Name"
            ,"Relative's Name"
            ,"Relation"
            ,"Contact No."
            ,"Address"
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
            'I'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:I1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:I1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}

class CertificateSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "Certificate Table";
    }

    public function collection()
    {
        $sql = "call export_certificate";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        
        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID"
            ,"ID"
            ,"Last Name"
            ,"First Name"
            ,"An Ex-Trainee"
            ,"Category"
            ,"Operation"
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
            'G'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:G1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:G1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}

class PrometricSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "SSW Prometric Table";
    }

    public function collection()
    {
        $sql = "call export_prometric";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        
        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID"
            ,"Certificate Table ID"
            ,"ID"
            ,"Last Name"
            ,"First Name"
            ,"Certificate"
            ,"Date Taken"
            ,"Passed"
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
            'H'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:H1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:H1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}

class JapanLanguageSheetExport implements FromCollection,WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    
    public function title(): string
    {
        return "SSW Japan Language Table";
    }

    public function collection()
    {
        $sql = "call export_japanlanguage";
        $data = collect(DB::select(DB::raw($sql)))->values()->all();
        $data = collect($data);
        
        return $data;
    }

    public function headings(): array
    {
        return[
            "Personal Table ID"
            ,"Certificate Table ID"
            ,"ID"
            ,"Last Name"
            ,"First Name"
            ,"Certificate"
            ,"Date Taken"
            ,"Passed"
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
            'H'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:H1')
                                ->getFont()
                                ->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:H1')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}