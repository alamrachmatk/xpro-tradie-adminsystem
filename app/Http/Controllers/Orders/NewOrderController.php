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
            ->select('orders.id AS order_id', 'orders.name', 'orders.due_date', 'orders.budget', 'orders.description', 'orders.status', 'orders.created_at AS order_created' , 
            'customers.id AS customer_id', 'customers.first_name', 'customers.last_name', 'customers.email',
             'customers.phone', 'customers.address', 'customers.category', 'customers.company_name', 
             'customers.abn_cn_number', 'customers.driving_licence', 
             'customers.photo_id', 'customers.avatar', 'customers.status AS customer_status', 'customers.created_at AS customer_created',
             'company_settings.id AS company_settings_id', 'company_settings.name AS company_settings_name')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->leftJoin('company_settings', 'company_settings.id', '=', 'orders.company_setting_id')
            ->get();
        
        $data = [];
        $dataCustomer = [];
        $dataCompanySettings = [];
 
            foreach ($queryOrders as $order) {
                //status customer
                $orderStatus = $order->customer_status;
                if ($orderStatus == 0) {
                    $orderStatus = 'NEW';
                } else if ($orderStatus == 1) {
                    $orderStatus = 'APPROVED';
                } else {
                    $orderStatus = 'REJECT';
                }

                $dataCustomer = [
                    'id' => $order->customer_id,
                    'first_name' => $order->first_name,
                    'last_name' => $order->last_name,
                    'email' => $order->email,
                    'phone' => $order->phone,
                    'address' => $order->address,
                    'category' => $order->category == 1 ? 'Company' : 'Housing',
                    'name' => $order->company_name,
                    'abn_cn_number' => $order->abn_cn_number,
                    'driving_licence' => '/'.ENV('CUSTOMER_IMAGE_URL_DV').'/'.$order->driving_licence,
                    'photo_id' => $order->photo_id,
                    'avatar' => '/'.ENV('CUSTOMER_IMAGE_URL_AVATAR').'/'.$order->avatar,
                    'status' => $orderStatus,
                    'created_at' => $order->customer_created,
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
                    'company_setting' => $dataCompanySettings,
                    'created_at' => $order->order_created,
                ];
            }
       // }
 
        return response([
            'success' => true,
            'message' => 'Data New Orders',
            'data' => $data
        ]);

    }

    public function show($id) {
        $Neworder = Orders::whereId($id)->first();

        if ($Neworder) {
            return response()->json([
                'success' => true,
                'message' => 'Data New Order',
                'data'    => $Neworder
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data not dfound!',
                'data'    => null
            ], 404);
        }
    }

    public function reject(Request $request, $id) {
        //validate data
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ],
        [
            'status.required' => 'status Required !',
        ]);

        $newOrderByID = Orders::findOrFail($id);
        $order = $newOrderByID->update($request->all());


        if ($order) {
            return response()->json([
                'success' => true,
                'message' => 'Data successfully reject/approved!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data failed reject/approved!',
            ], 500);
        }
    }
}