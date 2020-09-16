<?php

namespace App\Http\Controllers\Orders;

use App\Customers;
use App\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class WorkOrderController extends Controller 
{
    public function index() {
        $query = DB::table('work_orders')
        ->select('work_orders.id AS work_order_id', 'work_orders.status AS work_order_status', 'work_orders.created_at AS work_order_created_at', 'work_orders.updated_at AS work_order_updated_at',
        'work_orders.created_by AS work_order_created_by', 'work_orders.updated_by AS work_order_updated_by',
        'new_orders.id AS new_order_id', 'new_orders.name', 'new_orders.due_date', 'new_orders.budget', 'new_orders.description', 'new_orders.status', 
        'new_orders.created_at AS order_created_at', 'new_orders.updated_at AS order_updated_at',
        'new_orders.created_by AS order_created_by', 'new_orders.updated_by AS order_updated_by',
        'customers.id AS customer_id', 'customers.first_name', 'customers.last_name', 'customers.email',
        'customers.phone', 'customers.address', 'customers.category', 'customers.company_name', 
        'customers.abn_cn_number', 'customers.driving_licence', 
        'customers.photo_id', 'customers.avatar', 'customers.status AS customer_status', 'customers.created_at AS customer_created',
        'company_settings.id AS company_settings_id', 'company_settings.name AS company_settings_name')
        ->join('orders', 'orders.work_order_id', '=', 'work_orders.id')
        ->join('new_orders', 'new_orders.id', '=', 'orders.new_order_id')
        ->join('customers', 'customers.id', '=', 'new_orders.customer_id')
        ->leftJoin('company_settings', 'company_settings.id', '=', 'new_orders.company_setting_id')
        ->get();
        
        $data = [];
        $dataNewOrder = [];
        $dataCustomer = [];
        $dataCompanyeStting = [];
 
            foreach ($query as $value) {
                //status customer
                $customerStatus = $value->customer_status;
                if ($customerStatus == 0) {
                    $customerStatus = 'NEW';
                } else if ($customerStatus == 1) {
                    $customerStatus = 'ACTIVE';
                } else {
                    $customerStatus = 'BANNED';
                }

                $dataNewOrder = [
                    'id' => $value->new_order_id,
                    'name' => $value->name,
                    'due_date' => $value->due_date,
                    'budget' => $value->budget,
                    'status' => $value->status,
                    'description' => $value->description,
                    'created_at' => $value->order_created_at,
                    'updated_at' => $value->order_updated_at,
                    'created_by' => $value->order_created_by,
                    'updated_by' => $value->order_updated_by,
                ];

                $dataCustomer = [
                    'id' => $value->customer_id,
                    'first_name' => $value->first_name,
                    'last_name' => $value->last_name,
                    'email' => $value->email,
                    'phone' => $value->phone,
                    'address' => $value->address,
                    'category' => $value->category == 1 ? 'Company' : 'Housing',
                    'name' => $value->company_name,
                    'abn_cn_number' => $value->abn_cn_number,
                    'driving_licence' => '/'.ENV('CUSTOMER_IMAGE_URL_DV').'/'.$value->driving_licence,
                    'photo_id' => $value->photo_id,
                    'avatar' => '/'.ENV('CUSTOMER_IMAGE_URL_AVATAR').'/'.$value->avatar,
                    'status' => $customerStatus,
                    'created_at' => $value->customer_created,
                ];

                $dataCompanyeSetting = [
                    'id' => $value->company_settings_id,
                    'name' => $value->company_settings_name
                ];

                $data[] = 
                [
                    'id' => $value->work_order_id,
                    'new_order' =>  $dataNewOrder,
                    'customer' => $dataCustomer,
                    'company_setting' => $dataCompanyeSetting,
                    'created_at' => $value->work_order_created_at,
                    'updated_at' => $value->work_order_updated_at,
                    'created_by' => $value->work_order_created_by,
                    'updated_by' => $value->work_order_updated_by,
                    'status' => $value->work_order_status,
                ];
            }
 
        return response([
            'success' => true,
            'message' => 'Data New Orders',
            'data' => $data
        ]);
    
    }
}