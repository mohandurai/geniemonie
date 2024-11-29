<?php

namespace App\Http\Controllers\Api;

use App\Models\Bdeenquiry;
use App\Models\FranchiseEnquire;
use App\Models\AdvtEnquire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BdeenquiryController extends BaseController
{
    //bdeEnquiry
    public function bdeEnquiry(Request $request)
    {
        // print_r($request->user()->id);
        // exit;
        
        try {
            $bdeenq = Bdeenquiry::create([
                'email' => $request->email,
                'uid' => $request->user()->id,
                'address' => $request->address,
                'city_id' => $request->city_id,
                'state_id' => $request->state_id,
                'current_status_working' => $request->current_status_working,
                'profession_status' => $request->profession_status,
                'upload_id_proof' => $request->upload_id_proof,
                'address_proof' => $request->address_proof,
                'status' => 1 
            ]);

            $success['success'] = "true";
            $success['message'] = "BDE Enquery Added Successfully !!!";
            return response()->json($success, 201);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function franchEnquiry(Request $request)
    {
        // echo $request->user()->id;
        // exit;
        try {
            $frenq = FranchiseEnquire::create([
                'uid' => $request->user()->id,
                'company_name' => $request->company_name,
                'contact_person_name' => $request->contact_person_name,
                'category' => $request->category,
                'gst_no' => $request->gst_no,
                'company_email' => $request->company_email,
                'contact_no' => $request->contact_no,
                'address' => $request->address,
                'city_id' => $request->city_id,
                'state_id' => $request->state_id,
                'pincode' => $request->pincode,
                'status' => 1 
            ]);

            $success['success'] = "true";
            $success['message'] = "Franchise Enquery Added Successfully !!!";
            return response()->json($success, 201);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function advtEnquiry(Request $request)
    {
        // echo $request->user()->id;
        // exit;
        try {
            $frenq = AdvtEnquire::create([
                'uid' => $request->user()->id,
                'company_shop_name' => $request->company_shop_name,
                'contact_person_name' => $request->contact_person_name,
                'category' => $request->category,
                'gst' => $request->gst,
                'company_email' => $request->company_email,
                'referral_mobile_id' => $request->referral_mobile_id,
                'address' => $request->address,
                'city_id' => $request->city_id,
                'state_id' => $request->state_id,
                'pincode' => $request->pincode,
                'status' => 1 
            ]);

            $success['success'] = "true";
            $success['message'] = "Advertisement Enquery Added Successfully !!!";
            return response()->json($success, 201);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
