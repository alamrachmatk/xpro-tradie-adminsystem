<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;

class WorkOrderController extends Controller 
{
    public function index() {
        return view('workorders.index');
    }
}