<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Models\m_jobcategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JobCategoryController extends Controller
{


    public function view(Request $request){
        $type = strtoupper($request->data);
        $category = isset($request->category) ? $request->category : "";
        $cat = DB::table('m_jobcategories')->where('isDeleted',0)->where('JobType',strtoupper($request->data))->select()->get();

        $cat = DB::select("SELECT cat.Category,count(quali.ID) as 'cnt' from m_jobcategories cat
        JOIN m_joboperations op on op.JobCategoriesID = cat.ID
        left join m_jobqualifications quali on op.ID = quali.JobOperationsID AND quali.isDeleted <> 1
        where cat.isDeleted <> 1
        AND cat.JobType = '$type'
        AND op.isDeleted <> 1
        AND op.Hiring = 1
        group by cat.Category having count(quali.ID) > 0");

        $cards = DB::select("SELECT cat.ID as 'CategoryID',cat.Category,op.ID as 'OperationID',op.Operation,qua.Qualifications from m_jobcategories cat
        JOIN m_joboperations op on op.JobCategoriesID = cat.ID
        left join (SELECT ope.Operation,group_concat(quali.Qualification) as 'Qualifications' from m_joboperations ope
        JOIN m_jobqualifications quali on quali.JobOperationsID = ope.ID
        where quali.isDeleted <> 1
        group by ope.Operation) qua on qua.Operation = op.Operation
        where cat.isDeleted <> 1
        AND cat.JobType = '$type'
        AND cat.Category like '%$category%'
        AND op.isDeleted <> 1
        AND op.Hiring = 1
        AND qua.Qualifications is not null");

        return view('pages.jobcategory',["id"=>$request->data,"cat"=>$cat,"category"=>$request->category,"cards"=>$cards]);
    }

    public function view_jp(Request $request){
        $type = strtoupper($request->data);
        $category = isset($request->category) ? $request->category : "";
        $cat = DB::table('m_jobcategories')->where('isDeleted',0)->where('JobType',strtoupper($request->data))->select()->get();

        $cat = DB::select("SELECT cat.Category,count(quali.ID) as 'cnt' from m_jobcategories cat
        JOIN m_joboperations op on op.JobCategoriesID = cat.ID
        left join m_jobqualifications quali on op.ID = quali.JobOperationsID AND quali.isDeleted <> 1
        where cat.isDeleted <> 1
        AND cat.JobType = '$type'
        AND op.isDeleted <> 1
        AND op.Hiring = 1
        group by cat.Category having count(quali.ID) > 0");

        $cards = DB::select("SELECT cat.ID as 'CategoryID',cat.Category,op.ID as 'OperationID',op.Operation,qua.Qualifications from m_jobcategories cat
        JOIN m_joboperations op on op.JobCategoriesID = cat.ID
        left join (SELECT ope.Operation,group_concat(quali.Qualification) as 'Qualifications' from m_joboperations ope
        JOIN m_jobqualifications quali on quali.JobOperationsID = ope.ID
        where quali.isDeleted <> 1
        group by ope.Operation) qua on qua.Operation = op.Operation
        where cat.isDeleted <> 1
        AND cat.JobType = '$type'
        AND cat.Category like '%$category%'
        AND op.isDeleted <> 1
        AND op.Hiring = 1
        AND qua.Qualifications is not null");

        return view('jp.pages.jobcategory',["id"=>$request->data,"cat"=>$cat,"category"=>$request->category,"cards"=>$cards]);
    }
}
