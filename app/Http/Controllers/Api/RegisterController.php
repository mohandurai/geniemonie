<?php

namespace App\Http\Controllers\Api;

use App\Models\BuinessDetails;
use App\Models\Enquire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{

    public function userRegister(Request $request){

        try {
            $validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'phone_no' => 'required',
	    ]);

            if ($validator->fails()) {
                return response()->json(['errors' => error_processor($validator)], 403);
            }

            $user = User::updateOrCreate(
                ['id' => $request->user_id],
                [
                    'name' => !empty($request->name) ? $request->name : '',
                    'phone_no' => !empty($request->phone_no) ? $request->phone_no : '',
                ]
            );

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $data['user'] = $user;
            $success['data'] = $data;
            return $this->sendResponse($success, 'User register successfully.');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_type' => 'required:Admin,User,Player,BDE,Franchise,Advertiser',
                'user_id'=>'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => error_processor($validator)], 403);
            }

            $user = User::updateOrCreate(
                ['id' => $request->user_id],
                [
                    'approved_status' => 'P',
                    'user_type' => !empty($request->user_type) ? $request->user_type : '',
                    'email' => !empty($request->email) ? $request->email : '',
                    'address' => !empty($request->address) ? $request->address : '',
                    'state_id' => !empty($request->state_id) ? $request->state_id : 0,
                    'district_id' => !empty($request->district_id) ? $request->district_id : 0,
                    'city_id' => !empty($request->city_id) ? $request->city_id : '',
                    'pincode' => !empty($request->pincode) ? $request->pincode : '',
                    'working_status_id' => !empty($request->working_status_id) ? $request->working_status_id : 0,
                    'id_proof' => !empty($request->id_proof) ? $request->id_proof : '',
                    'address_proof' => !empty($request->address_proof) ? $request->address_proof : '',
                ]
            );
            $business_details = $request->business_details;
            $businessDetails = businessDetailsCreate($business_details, $user->id);
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $data['user'] = $user;
            $data['business_details'] = $businessDetails;
            $success['data'] = $data;
            return $this->sendResponse($success, 'User register successfully.');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function franchiseInquiry(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required',
                'email' => 'required|email',
                'ph_number' => 'required',
                'user_id' => 'required',
                'user_type' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => error_processor($validator)], 403);
            }


            $enquire = Enquire::firstOrCreate(
                ['enquire_id' => $request->enquire_id],
                [
                    'user_type' => !empty($request->user_type) ? $request->user_type : '',
                    'user_id' => !empty($request->user_id) ? $request->user_id : '',
                    'company_name' => !empty($request->company_name) ? $request->company_name : '',
                    'co_per_name' => !empty($request->co_per_name) ? $request->co_per_name : '',
                    'category' => !empty($request->category) ? $request->category : '',
                    'gst' => !empty($request->gst) ? $request->gst : '',
                    'ph_number' => !empty($request->ph_number) ? $request->ph_number : '',
                    'email' => !empty($request->email) ? $request->email : '',
                    'address_1' => !empty($request->address_1) ? $request->address_1 : '',
                    'state_id' => !empty($request->state_id) ? $request->state_id : '',
                    'city_id' => !empty($request->city_id) ? $request->city_id : '',
                    'district_id' => !empty($request->district_id) ? $request->district_id : '',
                    'pincode' => !empty($request->pincode) ? $request->pincode : '',
                ]
            );

            $success['data'] = $enquire;
            $msg = !empty($request->enquire_id) ? 'updated' : 'created';
            return $this->sendResponse($success, 'franchise inquiry ' . $msg . ' successfully.');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
