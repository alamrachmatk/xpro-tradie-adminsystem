<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;

class CustomerController extends Controller 
{
    public function index() {
        return view('customers.index');
    }
}