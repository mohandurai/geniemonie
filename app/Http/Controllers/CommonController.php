<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function getDistrictList(Request $request)
    {
        $searchTerm = request()->input('searchTerm');
        $stateID = !empty($request->input('state_id')) ? $request->input('state_id') : 0;
        $district = DB::table('district')
            ->select(
                DB::raw('district.district_id as id'),
                DB::raw('district.district_name as text'))
            ->whereRaw("(district_name like '%$searchTerm%')")
            ->where('district.state_id', $stateID)
            ->orderBy('district_name', 'ASC')
            ->get()->toArray();

        return response()->json($district);
    }

    public function getStateList(Request $request)
    {
        $searchTerm = request()->input('searchTerm');
        $state = DB::table('state')
            ->select(
                DB::raw('state.state_id as id'),
                DB::raw('state.state_name as text'))
            ->whereRaw("(state_name like '%$searchTerm%')")
            ->orderBy('state_name', 'ASC')
            ->get()->toArray();

        return response()->json($state);
    }

    public function getCityList(Request $request){
        $searchTerm = request()->input('searchTerm');
        $stateID = !empty($request->input('state_id')) ? $request->input('state_id') : 0;
        $districtID = !empty($request->input('district_id')) ? $request->input('district_id') : 0;
        $district = DB::table('city')
            ->select(
                DB::raw('city.city_id as id'),
                DB::raw('city.city_name as text'))
            ->whereRaw("(city_name like '%$searchTerm%')")
            ->where('city.state_id', $stateID)
            ->where('city.district_id', $districtID)
            ->orderBy('city_name', 'ASC')
            ->get()->toArray();

        return response()->json($district);
    }

    public function getPincodeList(Request $request){
        $searchTerm = request()->input('searchTerm');
        $cityId = !empty($request->input('city_id')) ? $request->input('city_id') : 0;
        $pincode = DB::table('city')
            ->select(
                DB::raw('city.pincode as id'),
                DB::raw('city.pincode as text'))
            ->whereRaw("(pincode like '%$searchTerm%')")
            ->where('city.city_id', $cityId)
            ->orderBy('pincode', 'ASC')
            ->get()->toArray();

        return response()->json($pincode);
    }

    public function searchPhoneNo(Request $request){
        $searchTerm = request()->input('searchTerm');
        $result = DB::table('users')
            ->select(
                DB::raw('users.id as id'),
                DB::raw(DB::raw('CONCAT((users.name),", Phone No: ", ifnull(users.phone_no,0)) AS text'))
            )
            ->whereRaw("(phone_no like '%$searchTerm%')")
            ->where('users.user_type', '=','User')
            ->orderBy('name', 'ASC')
            ->get()->toArray();
        array_push($result, ['id' => 'NEW', 'text' => 'Create New User']);
        return response()->json($result);
    }

   public function userDetails(Request  $request){
        $userId = request()->input('user_id');
        $result = DB::table('users')->join('business_details','business_details.user_id','=','users.id')->where('id',$userId)->first();
        return response()->json($result);
    }
}
