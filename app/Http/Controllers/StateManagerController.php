<?php

namespace App\Http\Controllers;

use App\Models\BDE;
use App\Models\City;
use App\Models\District;
use App\Models\Pincode;
use App\Models\SManager;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StateManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sManager = User::where('user_type','=','StateManager')->paginate(10);
        return view('master.state-manager.index')->with(compact('sManager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('master.state-manager.create');
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
            'name' => 'required',
            'date_of_join' => 'required',
            'education' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'marital_status' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'experience' => 'required',
            'father_name' => 'required',
        ],
            [
                'required' => 'The field is required.',
                'unique'    => ':attribute is already used',
            ]);


        $statesArr = "";
        if ($request->states){
            $statesArr =  implode(',', $request->states);
        }

        $sManager = new User();
        $sManager->user_type = "StateManager";
        $sManager->state_id = $request->post('state_id');
//        $sManager->states = $statesArr;
        $sManager->city_id = $request->post('city_id');
        $sManager->district_id = $request->post('district_id');
        $sManager->name = $request->post('name');
        $sManager->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $sManager->education = $request->post('education');
        $sManager->marital_status = $request->post('marital_status');
        $sManager->gender = $request->post('gender');
        $sManager->email = $request->post('email');
        $sManager->password = $request->post('password');
        $sManager->experience =$request->post('experience');
        $sManager->address = $request->post('address');
        $sManager->address_1 = $request->post('address_1');
        $sManager->father_name = $request->post('father_name');
        $sManager->created_by = Auth::id();
        $sManager->save();
        Session::flash('success', 'State Manager created successfully');
        return redirect(route('state-managers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SManager  $sManager
     * @return \Illuminate\Http\Response
     */
    public function show(SManager $sManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SManager  $sManager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sManager = User::where('user_type','=','StateManager')->find($id);
        $state = State::all();
        $district = District::where('state_id',!empty($sManager->state_id)?$sManager->state_id:0)->get();
        $city = City::where('state_id',!empty($sManager->state_id)?$sManager->state_id:0)->get();
        return view('master.state-manager.create')->with(compact('district', 'state', 'city','sManager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SManager  $sManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id)
    {
        $request->validate([
            'name' => 'required',
            'date_of_join' => 'required',
            'education' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'experience' => 'required',
            'father_name' => 'required',
        ],
            [
                'required' => 'The field is required.',
                'unique'    => ':attribute is already used',
            ]);


        $statesArr = "";
        if ($request->states){
            $statesArr =  implode(',', $request->states);
        }

        $sManager = User::find($Id);
        $sManager->state_id = $request->post('state_id');
//        $sManager->states = $statesArr;
        $sManager->city_id = $request->post('city_id');
        $sManager->district_id = $request->post('district_id');
        $sManager->name = $request->post('name');
        $sManager->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $sManager->education = $request->post('education');
        $sManager->marital_status = $request->post('marital_status');
        $sManager->gender = $request->post('gender');
        $sManager->experience =$request->post('experience');
        $sManager->address = $request->post('address');
        $sManager->address_1 = $request->post('address_1');
        $sManager->father_name = $request->post('father_name');
        $sManager->created_by = Auth::id();
        $sManager->save();
        Session::flash('warning', 'State Manager updated successfully');
        return redirect(route('state-managers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SManager  $sManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('user_type','=','StateManager')->delete($id);
        Session::flash('error', 'State Manager deleted successfully');
        return redirect(route('state-managers.index'));
    }

}
