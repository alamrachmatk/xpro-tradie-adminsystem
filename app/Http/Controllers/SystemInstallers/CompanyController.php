<?php

namespace App\Http\Controllers\SystemInstallers;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index() {
        return view('companies.index');
    }

    public function indexdetail() {
        return view('companies.index_detail');
    }
}