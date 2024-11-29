<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CWManager;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Franchise;
use App\Models\Pincode;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContentWriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cWManager = User::where('user_type', 'ContentWriter')->paginate(10);
        return view('master.content-writer.index')->with(compact('cWManager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.content-writer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
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


        $lastData = User::where('user_type', 'ContentWriter')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';

        $cWManager = new User();
        $cWManager->user_type = 'ContentWriter';
        $cWManager->code =  $this->generateNumber($lastFrNo, $stateCode);
        $cWManager->state_id = $request->post('state_id');
        $cWManager->district_id = $request->post('district_id');
        $cWManager->city_id = $request->post('city_id');
        $cWManager->name = $request->post('name');
        $cWManager->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $cWManager->education = $request->post('education');
        $cWManager->marital_status = $request->post('marital_status');
        $cWManager->gender = $request->post('gender');
        $cWManager->email = $request->post('email');
        $cWManager->password = bcrypt($request->post('password'));
        $cWManager->experience = $request->post('experience');
        $cWManager->address = $request->post('address');
        $cWManager->address_1 = $request->post('address_1');
        $cWManager->father_name = $request->post('father_name');
        $cWManager->created_by = Auth::id();
        $cWManager->save();
        Session::flash('success', 'Content writer created successfully');
        return redirect(route('content-writers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CWManager  $cWManager
     * @return \Illuminate\Http\Response
     */
    public function show(CWManager $cWManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CWManager  $cWManager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cManager = User::find($id);
        $franchise = User::where('user_type', '=', 'franchise')->get();
        $state = State::all();
        $district = District::where('state_id', !empty($cManager->state_id) ? $cManager->state_id : 0)->get();
        $city = City::where('state_id', !empty($cManager->state_id) ? $cManager->state_id : 0)->get();

        return view('master.content-writer.create')->with(compact('district', 'state', 'city', 'franchise', 'cManager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CWManager  $cWManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
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

        $lastData = User::where('user_type', 'ContentWriter')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';


        $cWManager = User::find($id);
        $cWManager->code =  $this->generateNumber($lastFrNo, $stateCode);
        $cWManager->state_id = $request->post('state_id');
        $cWManager->district_id = $request->post('district_id');
        $cWManager->city_id = $request->post('city_id');
        $cWManager->name = $request->post('name');
        $cWManager->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $cWManager->education = $request->post('education');
        $cWManager->marital_status = $request->post('marital_status');
        $cWManager->gender = $request->post('gender');
        $cWManager->experience = $request->post('experience');
        $cWManager->address = $request->post('address');
        $cWManager->address_1 = $request->post('address_1');
        $cWManager->father_name = $request->post('father_name');
        $cWManager->created_by = Auth::id();
        $cWManager->save();
        Session::flash('success', 'Content writer Updated successfully');
        return redirect(route('content-writers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CWManager  $cWManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('user_type', '=', 'ContentWriter')->delete($id);
        Session::flash('success', 'Content writer Deleted successfully');
        return redirect(route('content-writers.index'));
    }

    function generateNumber($lastNumber, $code)
    {
        $prefix = 'CW';
        $lastNumber = (int)preg_replace('/\D/', '', $lastNumber);
        $number = str_replace($prefix, '', $lastNumber ?? 0) + 1;
        $lengthOfNumber = strlen($number);
        $numberOfZeros = 5 - $lengthOfNumber;
        $totalLength = $numberOfZeros + $lengthOfNumber;
        $invoiceNumber = str_pad($number, $totalLength, '0', STR_PAD_LEFT);
        return $code . '-' . $prefix . $invoiceNumber;
    }
}
