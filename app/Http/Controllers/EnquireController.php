<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Enquire;
use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\Pincode;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EnquireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquire = Enquire::paginate(10);
        return view('master.enquires.index')->with(compact('enquire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::whereNotIn('user_type',['Player','Admin'])->get();
        return view('master.enquires.create')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|unique:enquires,company_name',
            'co_per_name' => 'required',
            'ph_number' => 'required|min:10|numeric',
            'email' => 'required',
            'website' => 'required',
            'industry' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'address_1' => 'required',
            'user_id' => 'required',
        ],
            [
                'required' => 'The field is required.',
                'unique'    => ':attribute is already used',
            ]);

        $user = User::where('id',$request->post('user_id'))->first();
        $enquire = new Enquire();
	$enquire->gst = $request->post('gst');
	$enquire->category = $request->post('category');
        $enquire->user_type = $user->user_type;
        $enquire->user_id = $request->post('user_id');
        $enquire->state_id = $request->post('state_id');
        $enquire->city_id = $request->post('city_id');
        $enquire->district_id = $request->post('district_id');
        $enquire->co_per_name = $request->post('co_per_name');
        $enquire->ph_number = $request->post('ph_number');
        $enquire->company_name = $request->post('company_name');
        $enquire->email = $request->post('email');
        $enquire->website = $request->post('website');
        $enquire->industry = $request->post('industry');
        $enquire->address_1 = $request->post('address_1');
        $enquire->address_2 = $request->post('address_2');
        $enquire->user_id = Auth::id();
        $enquire->save();
        Session::flash('success', 'Enquiry Added successfully');
        return redirect(route('enquires.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquire  $enquire
     * @return \Illuminate\Http\Response
     */
    public function show(Enquire $enquire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquire  $enquire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $enquire = Enquire::find($id);
        $state = State::all();
        $district = District::where('state_id',$enquire->state_id)->get();
        $city = City::where('state_id',$enquire->state_id)->get();
        $user = User::whereNotIn('user_type',['Player','Admin'])->get();
        return view('master.enquires.create')->with(compact('user','district', 'state', 'city', 'enquire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquire  $enquire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquire $enquire)
    {
        $validated = $request->validate([
            'company_name' => 'required|unique:enquires,company_name,'. $enquire->enquire_id . ',enquire_id',
            'co_per_name' => 'required',
            'ph_number' => 'required|min:10|numeric',
            'email' => 'required',
            'website' => 'required',
            'industry' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'address_1' => 'required',
            'user_id'=>'required',
        ],
            [
                'required' => 'The field is required.',
                'unique'    => ':attribute is already used',
            ]);

        $user = User::where('id',$request->post('user_id'))->first();
        $enquire->user_type = $user->user_type;
	$enquire->gst = $request->post('gst');
	$enquire->category = $request->post('category');
        $enquire->user_id = $request->post('user_id');
        $enquire->state_id = $request->post('state_id');
        $enquire->city_id = $request->post('city_id');
        $enquire->district_id = $request->post('district_id');
        $enquire->co_per_name = $request->post('co_per_name');
        $enquire->ph_number = $request->post('ph_number');
        $enquire->company_name = $request->post('company_name');
        $enquire->email = $request->post('email');
        $enquire->website = $request->post('website');
        $enquire->industry = $request->post('industry');
        $enquire->address_1 = $request->post('address_1');
        $enquire->address_2 = $request->post('address_2');
        $enquire->user_id = Auth::id();
        $enquire->save();
        Session::flash('success', 'Enquiry Updated successfully');
        return redirect(route('enquires.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquire  $enquire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Enquire::destroy($id);
        Session::flash('success', 'Enquiry Deleted successfully');
        return redirect(route('enquires.index'));
    }

    public function statusChange(Request $request){
        $Id = $request->enquire_id;
        if ($Id){
            $Details = Enquire::find($Id);

            if (!empty($Details->status) && $Details->status == 1) {
                $Details->update(['status' => '0']);
                return response()->json(['msg'=>'Enquiry has been in inactive successfully']);
            } else {
                $Details->update(['status' => '1']);
                return response()->json(['msg'=>'Enquiry has been active successfully']);
            }
        }
    }
}
