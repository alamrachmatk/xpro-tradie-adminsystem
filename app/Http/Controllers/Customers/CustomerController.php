<?php

namespace App\Http\Controllers\Customers;

use App\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

class CustomerController extends Controller 
{
    public function index() {
        $data = Customers::orderBy('id', 'DESC')->where('deleted', 0)->get();
        return response([
            'success' => true,
            'message' => 'Data Customers',
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
                    $request->avatar->move(public_path('customers/images'), $avatarName);
                }
                if($request->driving_licence != null && $request->driving_licence != '') {
                    $request->driving_licence->move(public_path('customers/images'), $drivingLicenceName);
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

        if ($customer) {
            return response()->json([
                'success' => true,
                'message' => 'Data Customer',
                'data'    => $customer
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
            $avatarName = 'avatar-'.time().'.'.$request->avatar->getClientOriginalExtension();
        }
        if($request->driving_licence != null && $request->driving_licence != '') {
            $drivingLicenceName = 'dv-'.time().'.'.$request->driving_licence->getClientOriginalExtension();
        }

        $customer = $customerByID->update($request->all());

        if ($customer) {
            if($request->avatar != null && $request->avatar != '') {
                $request->avatar->move(public_path('images/customers'), $avatarName);
            }
            if($request->driving_licence != null && $request->driving_licence != '') {
                $request->driving_licence->move(public_path('images/customers'), $drivingLicenceName);
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