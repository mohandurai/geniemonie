<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndiaStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $stateList = DB::table('tableName')->select('id','City', 'Pincode','District','StateName')
           ->get();

       foreach ($stateList as $value){
           $state = State::updateOrCreate(['state_name' =>$value->StateName], ['state_name' =>$value->StateName]);
           $stateId = $state->state_id;
           $district = District::updateOrCreate(['district_name' =>$value->District], ['district_name' =>$value->District,'state_id'=>$stateId]);
           $districtId = $district->district_id;
           City::updateOrCreate(['pincode' =>$value->Pincode], ['state_id'=>$district->state_id,'district_id'=>$districtId,'pincode' =>$value->Pincode,'city_name'=>$value->City]);
       }

    }
}
