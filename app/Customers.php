<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'address', 'category', 'company_name', 
        'abn_cn_number', 'driving_licence', 'photo_id', 'avatar', 'status', 'created_at', 'updated_at', 'deleted'
    ];
}
