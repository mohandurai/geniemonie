<?php

namespace App\Http\Controllers;

use App\Models\AdPackage;
use App\Models\AdvtEnquire;
use App\Models\City;
use App\Models\District;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertise = AdvtEnquire::paginate(10);
        return view('master.advertise.index')->with(compact('advertise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //$user = User::whereNotIn('user_type',['Advertiser','Admin'])->get();
        // $package = AdPackage::all();
        $advertise = AdvtEnquire::all();
       
        return view('master.advertise.create')->with(compact('advertise'));
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
            'company_name'=>'required',
            'contact_person_name'=>'required',
            'phone_no'=>'required',
            'email'=>'required',
        ]);
        $advertise = new AdvtEnquire();
        $advertise->user_type = 'Advertiser';
        $advertise->company_shop_name = $request->company_shop_name;
        $advertise->contact_person_name = $request->contact_person_name;
        $advertise->category = $request->category;
        $advertise->gst = $request->gst;
        $advertise->company_email = $request->company_email;
        $advertise->referral_mobile_id = $request->referral_mobile_id;
        $advertise->address = $request->address;
        $advertise->state_id = $request->state_id;
        $advertise->city_id = $request->city_id;
        $advertise->user_id = $request->user_id;
        $advertise->adp_id = $request->adp_id;
        $advertise->pincode = $request->pincode;
        $advertise->save();
        Session::flash('success', 'Advertise Added successfully');
        return redirect(route('advertise.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertise = Advertise::find($id);
        // $aaa = compact('advertise');
        // echo "<pre>";
        // print_r($aaa);
        // echo "</pre>";
        // exit;
        $user = User::whereNotIn('user_type',['Advertiser','Admin'])->get();
        $package = AdPackage::all();
        $state = State::all();
        $district = District::where('state_id',$advertise->state_id)->get();
        $city = City::where('state_id',$advertise->state_id)->get();
        return view('master.advertise.create')->with(compact('advertise','state','district','city','user','package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name'=>'required',
            'contact_person_name'=>'required',
            'phone_no'=>'required',
            'email'=>'required',
        ]);
        $advertise = Advertise::find($id);
        $advertise->user_type = 'Advertiser';
        $advertise->company_name = $request->company_name;
        $advertise->contact_person_name = $request->contact_person_name;
        $advertise->category = $request->category;
        $advertise->gst_no = $request->gst_no;
        $advertise->email = $request->email;
        $advertise->phone_no = $request->phone_no;
        $advertise->address = $request->address;
        $advertise->address_1 = $request->address_1;
        $advertise->state_id = $request->state_id;
        $advertise->district_id = $request->district_id;
        $advertise->city_id = $request->city_id;
        $advertise->user_id = $request->user_id;
        $advertise->adp_id = $request->adp_id;
        $advertise->pincode = $request->pincode;
        $advertise->save();
        Session::flash('warning', 'Advertise Updated successfully');
        return redirect(route('advertise.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertise::destroy($id);
        Session::flash('error', 'Advertise Deleted successfully');
        return redirect(route('advertise.index'));
    }

    public function advertiseStatusChange($id){
        $user = Advertise::find($id);
        if (!empty($user) && $user->approved_status == 'Y'){
            $user->update(['approved_status'=>'N']);
        }
        else{
            $user->update(['approved_status'=>'Y']);
        }
        Session::flash('success', 'Advertise Status Change successfully');
        return back();
    }
}
