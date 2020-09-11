<?php

namespace App\Http\Controllers\Orders;

use App\Customers;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class NeworderController extends Controller
{
    public function index() {

        $queryOrders = DB::table('orders')
            ->select('orders.id AS order_id', 'orders.name', 'orders.due_date', 'orders.budget', 'orders.description', 'orders.status', 'orders.created_at' , 
            'customers.id AS customer_id', 'customers.first_name', 'customers.last_name', 'customers.email',
             'customers.phone', 'customers.address', 'customers.category', 'customers.company_name', 
             'customers.abn_cn_number', 'customers.driving_licence', 
             'customers.photo_id', 'customers.avatar', 'customers.status AS customer_status',
             'company_settings.id AS company_settings_id', 'company_settings.name AS company_settings_name')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->leftJoin('company_settings', 'company_settings.id', '=', 'orders.company_setting_id')
            ->get();
        
        $data = [];
        $dataCustomer = [];
        $dataCompanySettings = [];
 
       // if(!empty($queryOrders)) {
            foreach ($queryOrders as $order) {
                $dataCustomer = [
                    'id' => $order->customer_id,
                    'first_name' => $order->first_name,
                    'last_name' => $order->last_name,
                    'email' => $order->email,
                    'phone' => $order->phone,
                    'address' => $order->address,
                    'category' => $order->category,
                    'name' => $order->company_name,
                    'abn_cn_number' => $order->abn_cn_number,
                    'driving_licence' => $order->driving_licence,
                    'photo_id' => $order->photo_id,
                    'avatar' => $order->avatar,
                    'status' => $order->customer_status
                ];
                $dataCompanySettings = [
                    'id' => $order->company_settings_id,
                    'name' => $order->company_settings_name
                ];

                $data[] = 
                [
                    'id' => $order->order_id,
                    'name' => $order->name,
                    'due_date' => $order->due_date,
                    'budget' => $order->budget,
                    'status' => $order->status,
                    'description' => $order->description,
                    'customer' => $dataCustomer,
                    'company_settings' => $dataCompanySettings
                ];
            }
       // }
 
        return response([
            'success' => true,
            'message' => 'Data New Orders',
            'data' => $data
        ]);
        // $data = Orders::get();
        // return response([
        //     'success' => true,
        //     'message' => 'Data New Orders',
        //     'data' => $data
        // ]);

        // $queryOrders = Orders::find() ->joinWith(['customers'])
        //                         ->orderBy([Orders::tableName().'.id' => SORT_DESC]);


        // $orders = $queryOrders->all();
        // $data = [];
        // if(!empty($orders)) {
        //     foreach ($orders as $order) {
        //         $data = [
        //             'id' => $order->id,
        //         ];
        //     }
        // }

    }
}