<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;

class HistoryOrderController extends Controller
{
    public function index() {
        return view('historyorders.index');
    }
}