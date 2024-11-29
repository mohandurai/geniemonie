<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\FranchiseEnquire;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FranchiseEnquireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquire = FranchiseEnquire::paginate(10);
        return view('master.enquiry-management.franchise.index')->with(compact('enquire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.enquiry-management.franchise.create');
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
            'contact_no'=>'required',
        ]);
        $enquire = new FranchiseEnquire();
        $enquire->company_name = $request->company_name;
        $enquire->contact_person_name = $request->contact_person_name;
        $enquire->category = $request->category;
        $enquire->gst_no = $request->gst_no;
        $enquire->company_email = $request->company_email;
        $enquire->contact_no = $request->contact_no;
        $enquire->address = $request->address;
        $enquire->state_id = $request->state_id;
        $enquire->city_id = $request->city_id;
        $enquire->pin_code = $request->pin_code;
        $enquire->save();
        Session::flash('success', 'Franchise Enquire Added successfully');
        return redirect(route('franchises-enquires.index'));
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
        $enquire = FranchiseEnquire::find($id);
        $state = State::all();
        $district = District::where('state_id',$enquire->state_id)->get();
        $city = City::where('state_id',$enquire->state_id)->get();
        return view('master.enquiry-management.franchise.create')->with(compact('enquire','state','district','city'));

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
            'contact_no'=>'required',
        ],
            [
                'required' => 'The field is required.',
                'unique' => ':attribute is already used',
            ]);

        $enquire = FranchiseEnquire::find($id);
        $enquire->company_name = $request->company_name;
        $enquire->contact_person_name = $request->contact_person_name;
        $enquire->category = $request->category;
        $enquire->gst_no = $request->gst_no;
        $enquire->company_email = $request->company_email;
        $enquire->contact_no = $request->contact_no;
        $enquire->address = $request->address;
        $enquire->state_id = $request->state_id;
        $enquire->city_id = $request->city_id;
        $enquire->pin_code = $request->pin_code;
        $enquire->save();
        Session::flash('warning', 'Franchise Enquire Updated successfully');
        return redirect(route('franchises-enquires.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FranchiseEnquire::destroy($id);
        Session::flash('error', 'Franchise Enquire Deleted successfully');
        return redirect(route('franchises-enquires.index'));
    }
}
