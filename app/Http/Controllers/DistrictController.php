<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = District::all();
        return view('master.district.index')->with(compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state  = State::all();
        return view('master.district.create')->with(compact('state'));
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
            'state_id' => 'required',
            'district_name' => 'required|unique:district,district_name',
        ]);

        $district = new District();
        $district->state_id = $request->post('state_id');
        $district->district_name = $request->post('district_name');
        $district->save();
        $request->session()->flash('success', 'District created successfully');
        return redirect(route('district.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::find($id);
        $state  = State::all();
        return view('master.district.create')->with(compact('district','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $request->validate([
            'state_id' => 'required',
            'district_name' => 'required|unique:district,district_name,'. $district->district_id . ',district_id'
        ]);
        $district->state_id = $request->post('state_id');
        $district->district_name = $request->post('district_name');
        $district->save();
        $request->session()->flash('warning', 'District updated successfully');
        return redirect(route('district.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        District::destroy($id);
        $request->session()->flash('danger', 'district has been deleted successfully');
        return redirect(route('district.index'));

    }

    public function statusChange(Request $request){
        $districtId = $request->district_id;
        if ($districtId){
            $districtDetails = District::find($districtId);
            if (!empty($districtDetails->status) && $districtDetails->status == 1) {
                $districtDetails->update(['status' => '0']);
                return response()->json(['msg'=>'District status in-active successfully']);
            } else {
                $districtDetails->update(['status' => '1']);
                return response()->json(['msg'=>'District status active successfully']);
            }
        }
    }
}
