<?php

namespace App\Http\Controllers\SystemInstallers;

use App\Http\Controllers\Controller;

class CompanysettingsController extends Controller 
{
    public function index() {
        return view('companysettings.index');
    }
}