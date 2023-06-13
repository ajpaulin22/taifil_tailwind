<?php

namespace App\Http\Controllers\MasterMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    public function view(){
        return view("/admin/MasterMaintenance/UserInformation");
    }
}
