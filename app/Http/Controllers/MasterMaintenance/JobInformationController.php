<?php

namespace App\Http\Controllers\MasterMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobInformationController extends Controller
{
    public function view(){
        return view("/admin/MasterMaintenance/JobInformation");
    }
}
