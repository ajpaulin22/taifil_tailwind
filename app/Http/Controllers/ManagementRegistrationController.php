<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementRegistrationController extends Controller
{
    public function view(){
        return view("/admin/ManagementRegistration");
    }
}
