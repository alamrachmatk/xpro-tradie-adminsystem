<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewOrders extends Model
{
    protected $fillable = [
        'customer_id', 'company_setting_id', 'due_date', 'budget', 'status' 
    ];
} 