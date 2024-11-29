<?php

namespace App\Http\Controllers\Api;

use App\Models\Bdeenquiry;
use Illuminate\Http\Request;

class BdeenquiryController extends Controller
{
    //bdeEnquiry
    public function bdeEnquiry(Request $request)
    {
        try {
            $bdeenq = Bdeenquiry::create([
                'email' => $request->email,
                'address' => $request->address,
                'city_id' => $request->city_id,
                'state_id' => $request->state_id,
                'current_status_working' => $request->current_status_working,
                'profession_status' => $request->profession_status,
                'upload_id_proof' => $request->upload_id_proof,
                'address_proof' => $request->address_proof,
                'status' => 1 
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
