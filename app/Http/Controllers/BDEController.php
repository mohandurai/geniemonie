<?php

namespace App\Http\Controllers;

use App\Models\BDE;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Bdeenquiry;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BDEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bde = Bdeenquiry::paginate(10);
        return view('master.bde.index')->with(compact('bde'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.bde.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
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
            ]
        );

        $lastData = User::where('user_type', 'BDE')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';

        $bDE = new User();
        $bDE->user_type = 'BDE';
        $bDE->code =  $this->generateNumber($lastFrNo, $stateCode);
        $bDE->state_id = $request->post('state_id');
        $bDE->district_id = $request->post('district_id');
        $bDE->city_id = $request->post('city_id');
        $bDE->name = $request->post('name');
        $bDE->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $bDE->education = $request->post('education');
        $bDE->marital_status = $request->post('marital_status');
        $bDE->gender = $request->post('gender');
        $bDE->email = $request->post('email');
        $bDE->password = bcrypt($request->post('password'));
        $bDE->experience = $request->post('experience');
        $bDE->address = $request->post('address');
        $bDE->address_1 = $request->post('address_1');
        $bDE->father_name = $request->post('father_name');
        $bDE->created_by = Auth::id();
        $bDE->save();
        Session::flash('success', 'bde Added successfully');
        return redirect(route('bde.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BDE  $bDE
     * @return \Illuminate\Http\Response
     */
    public function show(BDE $bDE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BDE  $bDE
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bDE = User::where('user_type', '=', 'BDE')->find($id);
        $state = State::all();
        $district = District::where('state_id', !empty($bDE->state_id) ? $bDE->state_id : 0)->get();
        $city = City::where('state_id', !empty($bDE->state_id) ? $bDE->state_id : 0)->get();
        return view('master.bde.create')->with(compact('district', 'state', 'city', 'bDE'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BDE  $bDE
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
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
            ]
        );

        $lastData = User::where('user_type', 'BDE')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';


        $bDE = User::find($id);
        $bDE->code =  $this->generateNumber($lastFrNo, $stateCode);
        $bDE->state_id = $request->post('state_id');
        $bDE->district_id = $request->post('district_id');
        $bDE->city_id = $request->post('city_id');
        $bDE->name = $request->post('name');
        $bDE->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $bDE->education = $request->post('education');
        $bDE->marital_status = $request->post('marital_status');
        $bDE->gender = $request->post('gender');
        $bDE->experience = $request->post('experience');
        $bDE->address = $request->post('address');
        $bDE->address_1 = $request->post('address_1');
        $bDE->father_name = $request->post('father_name');
        $bDE->created_by = Auth::id();
        $bDE->save();
        Session::flash('success', 'bde Updated successfully');
        return redirect(route('bde.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BDE  $bDE
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('user_type', '=', 'BDE')->delete($id);
        Session::flash('success', 'bde Deleted successfully');
        return redirect(route('bde.index'));
    }

    function generateNumber($lastNumber, $code)
    {
        $prefix = 'BD';
        $lastNumber = (int)preg_replace('/\D/', '', $lastNumber);
        $number = str_replace($prefix, '', $lastNumber ?? 0) + 1;
        $lengthOfNumber = strlen($number);
        $numberOfZeros = 5 - $lengthOfNumber;
        $totalLength = $numberOfZeros + $lengthOfNumber;
        $invoiceNumber = str_pad($number, $totalLength, '0', STR_PAD_LEFT);
        return $code . '-' . $prefix . $invoiceNumber;
    }
}
