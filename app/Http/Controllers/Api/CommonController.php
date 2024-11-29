<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Pincode;
use App\Models\State;
use App\Models\WorkingStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommonController extends BaseController
{

    public function getState()
    {
        try {
            $state = State::orderByRaw('BINARY state_name ASC')->get();
            $success['data'] = $state;
            return $this->sendResponse($success, 'State fetched successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getDistrict($stateID){
        try {
             $district = District::with('stateName')->where('state_id',$stateID)->orderByRaw('BINARY district_name ASC')->get();
            $success['data'] = $district;
            return $this->sendResponse($success, 'District fetched successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCity($stateId,$districtID)
    {
        try {
           $state = City::with('stateName','DistrictName')->where('state_id',$stateId)->where('district_id',$districtID)->orderByRaw('BINARY city_name ASC')->get();
            $success['data'] = $state;
            return $this->sendResponse($success, 'City fetched successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function getPincode($cityId)
    {
        try {
            $state = DB::table('pincode')->where('city_id',$cityId)->get();
            $success['data'] = $state;
            return $this->sendResponse($success, 'Pincode fetched successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getWorkingStatus(){
        try {
            $workingStatus = WorkingStatus::all();
            $success['data'] = $workingStatus;
            return $this->sendResponse($success, 'Working Status fetched successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getLocation(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'pincode' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => error_processor($validator)], 403);
            }
            $input = $request->all();
            $location = City::with('districtName','stateName')->where('pincode','like','%' . $input['pincode'] .'%')->first();
            return $this->sendResponse($location, 'Location fetched successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
