<?php

namespace App\Http\Controllers\SystemInstallers;

use App\CompanySettings;
use App\Http\Controllers\Controller;

class CompanySettingsController extends Controller 
{
    public function index() {
        $query = CompanySettings::orderBy('id', 'DESC')->get();
        $data = [];

        foreach($query as $value) {
            $data[] = [
                'id' => $value->id,
                'name' => $value->name,
                'status' => $value->status,
                'description' => $value->description,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'created_by' => $value->created_by,
                'updated_by' => $value->updated_by,
            ];
        }

        return response([
            'success' => true,
            'message' => 'Data Company Settings',
            'data' => $data
        ]);
    }
}