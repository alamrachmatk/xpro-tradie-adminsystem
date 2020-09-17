<?php

namespace App\Http\Controllers\Orders;

use App\Customers;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\NewOrders;

class NeworderController extends Controller
{
    public function index(Request $request) {
        $query = DB::table('new_orders')
            ->select('new_orders.id AS new_order_id', 'new_orders.name', 'new_orders.due_date', 'new_orders.budget', 'new_orders.description', 'new_orders.status', 
             'new_orders.created_at AS order_created_at' , 'new_orders.updated_at AS order_updated_at' ,
             'new_orders.created_by AS order_created_by' , 'new_orders.updated_by AS order_updated_by' ,
             'customers.id AS customer_id', 'customers.first_name', 'customers.last_name', 'customers.email',
             'customers.phone', 'customers.address', 'customers.category', 'customers.company_name', 
             'customers.abn_cn_number', 'customers.driving_licence', 'customers.photo_id', 'customers.avatar', 'customers.status AS customer_status', 
             'customers.created_at AS customer_created_at' , 'customers.updated_at AS customer_updated_at' ,
             'customers.created_by AS customer_created_by' , 'customers.updated_by AS customer_updated_by' ,
             'company_settings.id AS company_settings_id', 'company_settings.name AS company_settings_name',
             )
            ->join('customers', 'customers.id', '=', 'new_orders.customer_id')
            ->join('company_settings', 'company_settings.id', '=', 'new_orders.company_setting_id')
            ->where('company_settings.id', $request->company_setting_id)
            ->get();
        
        $data = [];
        $dataCustomer = [];
        $dataCompanySettings = [];
 
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
                    'created_at' => $value->customer_created_at,
                    'updated_at' => $value->customer_updated_at,
                    'created_by' => $value->customer_created_by,
                    'updated_by' => $value->customer_updated_by,
                ];

                $dataCompanySettings = [
                    'id' => $value->company_settings_id,
                    'name' => $value->company_settings_name
                ];

                $data[] = 
                [
                    'id' => $value->new_order_id,
                    'name' => $value->name,
                    'due_date' => $value->due_date,
                    'budget' => '$'.$value->budget,
                    'description' => $value->description,
                    'customer' => $dataCustomer,
                    'company_setting' => $dataCompanySettings,
                    'status' => $value->status,
                    'created_at' => $value->order_created_at,
                    'updated_at' => $value->order_updated_at,
                    'created_by' => $value->order_created_by,
                    'updated_by' => $value->order_updated_by,
                ];
            }
 
        return response([
            'success' => true,
            'message' => 'Data New Orders',
            'data' => $data
        ]);

    }

    public function show($id) {
        $Neworder = NewOrders::whereId($id)->first();

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

        $query = NewOrders::findOrFail($id);

        $update = $query->update($request->all());

        if ($update) {
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