<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::orderBy('city_name','ASC')->paginate(1000);
        return view('master.city.index')->with(compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $state = State::all();
        return view('master.city.create')->with(compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|numeric',
            'district_id' =>'required|numeric',
            'city_name' => 'required',
            'pincode' => 'required',
        ]);

        $city = new City();
        $city->state_id = $request->post('state_id');
        $city->district_id = $request->post('district_id');
        $city->city_name = $request->post('city_name');
        $city->pincode = $request->post('pincode');
        $city->save();
        $request->session()->flash('success', 'City created successfully');
        return redirect(route('city.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $state = State::all();
        $district  = District::all();
        return view('master.city.create')->with(compact('district','city','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
         $request->validate([
            'state_id' =>'required|numeric',
            'district_id' => 'required|numeric',
             'city_name' => 'required',
             'pincode' => 'required',
        ]);
        $city->state_id = $request->post('state_id');
        $city->district_id = $request->post('district_id');
        $city->city_name = $request->post('city_name');
        $city->pincode = $request->post('pincode');
        $city->save();
        $request->session()->flash('warning', 'City updated successfully');
        return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        City::destroy($id);
        $request->session()->flash('danger', 'City deleted successfully');
        return redirect(route('city.index'));

    }

    public function statusChange(Request $request){
        $cityId = $request->city_id;
        if ($cityId){
            $cityDetails = City::find($cityId);
            if (!empty($cityDetails->status) && $cityDetails->status == 1) {
                $cityDetails->update(['status' => '0']);
                return response()->json(['msg'=>'city has been in-active successfully']);
            } else {
                $cityDetails->update(['status' => '1']);
                return response()->json(['msg'=>'city has been active successfully']);
            }
        }
    }
}
