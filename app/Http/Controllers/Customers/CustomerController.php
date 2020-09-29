<?php

namespace App\Http\Controllers\Customers;

use App\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CustomerController extends Controller 
{
    public function index(Request $request) {

        if($request->sortdesc == 'false' ) {
            $request->sortdesc = 'ASC';
        } else {
            $request->sortdesc = 'DESC';
        }
        
        $query = Customers::orderBy($request->sortby, $request->sortdesc)->where('deleted', 0)->paginate($request->limit);

        $meta = [
            'total' => $query->total(),
            'per_page' => $request->limit,
            'current_page' => $query->currentPage(),
            'next_page_url' => $query->nextPageUrl(),
            'prev_page_url' => $query->previousPageUrl(),
        ];
        $data = [];
        
        foreach($query as $value) {
            $data[] = [
                'id' => $value->id,
                'first_name' => $value->first_name,
                'last_name' => $value->last_name,
                'email' => $value->email,
                'phone' => $value->phone,
                'address' => $value->address,
                'category' => $value->category,
                'name' => $value->company_name,
                'abn_cn_number' => $value->abn_cn_number,
                'driving_licence' => '/'.ENV('CUSTOMER_IMAGE_URL_DV').'/'.$value->driving_licence,
                'photo_id' => $value->photo_id,
                'avatar' => '/'.ENV('CUSTOMER_IMAGE_URL_AVATAR').'/'.$value->avatar,
                'status' => $value->status,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'created_by' => $value->created_by,
                'updated_by' => $value->updated_by,
            ];
        }
 
 
        return response([
            'success' => true,
            'message' => 'Data Customer',
            'meta' => $meta,
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        //validate data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'category' => 'required',
            'driving_licence' => 'required',
            'photo_id' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => true,
                'message' => 'please fill in the empty fields',
                'data' => $validator->errors()
            ], 400);
        } else {
            $avatarName = null;
            $drivingLicenceName = null;
            if($request->avatar != null && $request->avatar != '') {
                $avatarName = time().'avatar.'.$request->avatar->getClientOriginalExtension();
            }
            if($request->driving_licence != null && $request->driving_licence != '') {
                $drivingLicenceName = time().'dv.'.$request->driving_licence->getClientOriginalExtension();
            }
            $customer = Customers::create([
                'first_name' => $request->input('first_name'),
                'last_name'   => $request->input('last_name'),
                'email'   => $request->input('email'),
                'phone'   => $request->input('phone'),
                'address'   => $request->input('address'),
                'category'   => $request->input('category'),
                'company_name'   => $request->input('company_name'),
                'abn_cn_number'   => $request->input('abn_cn_number'),
                'driving_licence'   => $drivingLicenceName,
                'photo_id'   => $request->input('photo_id'),
                'avatar'   => $avatarName,
                'status'   => $request->input('status'),
            ]);
            if ($customer) {
                if($request->avatar != null && $request->avatar != '') {
                    $request->avatar->move(ENV('CUSTOMER_IMAGE_URL_AVATAR'), $avatarName);
                }
                if($request->driving_licence != null && $request->driving_licence != '') {
                    $request->driving_licence->move(ENV('CUSTOMER_IMAGE_URL_DV'), $drivingLicenceName);
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Data saved successfully!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data failed to save!',
                ], 400);
            }
        }
    }

    public function show($id) {
        $customer = Customers::whereId($id)->first();
        $data = [];

        $data = [
            'id' => $customer->id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'email' => $customer->email,
            'phone' => $customer->phone,
            'address' => $customer->address,
            'category' => $customer->category,
            'name' => $customer->company_name,
            'abn_cn_number' => $customer->abn_cn_number,
            'driving_licence' => '/'.ENV('CUSTOMER_IMAGE_URL_DV').'/'.$customer->driving_licence,
            'photo_id' => $customer->photo_id,
            'avatar' => '/'.ENV('CUSTOMER_IMAGE_URL_AVATAR').'/'.$customer->avatar,
            'status' => $customer->status,
            'created_at' => $customer->customer_created,
        ];
        
        if ($customer) {
            return response()->json([
                'success' => true,
                'message' => 'Data Customer',
                'data'    => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data not dfound!',
                'data'    => null
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $customerByID = Customers::findOrFail($id);
        $avatarName = null;
        $drivingLicenceName = null;
        if($request->avatar != null && $request->avatar != '') {
            $avatarName = time().'avatar.'.$request->avatar->getClientOriginalExtension();
        }
        if($request->driving_licence != null && $request->driving_licence != '') {
            $drivingLicenceName = time().'dv.'.$request->driving_licence->getClientOriginalExtension();
        }

        $customer = $customerByID->update($request->all());

        if ($customer) {
            if($request->avatar != null && $request->avatar != '') {
                $request->avatar->move(ENV('CUSTOMER_IMAGE_URL_AVATAR'), $avatarName);
            }
            if($request->driving_licence != null && $request->driving_licence != '') {
                $request->driving_licence->move(ENV('CUSTOMER_IMAGE_URL_DV'), $drivingLicenceName);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data successfully update!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data failed update!',
            ], 500);
        }

    }

    public function delete(Request $request, $id)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'deleted' => 'required',
        ],
        [
            'deleted.required' => 'deleted Required !',
        ]);

        $customerByID = Customers::findOrFail($id);
        $customer = $customerByID->update($request->all());

        if ($customer) {
            return response()->json([
                'success' => true,
                'message' => 'Data successfully deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data failed deleted!',
            ], 500);
        }

    }
}