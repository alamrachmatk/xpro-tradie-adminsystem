<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySettings extends Model
{
    protected $fillable = [
        'id', 'name', 'description', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by' 
    ];
} 