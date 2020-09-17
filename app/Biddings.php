<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biddings extends Model
{
    protected $fillable = [
        'order_id', 'company_id', 'labor_time', 'price', 'status', 'description' 
    ];
} 