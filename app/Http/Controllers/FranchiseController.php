<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\FranchiseEnquire;
use App\Models\Pincode;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $franchise = User::where('user_type', '=', 'franchise')->paginate(10);
        return view('master.franchise.index')->with(compact('franchise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $franchise = FranchiseEnquire::paginate(10);
        $state = State::all();
        $district = District::where('state_id', $franchise->state_id)->get();
        $city = City::where('state_id', $franchise->state_id)->get();
        return view('master.franchise.create')->with('state',$state);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'company_name' => 'required|unique:users,company_name',
            'contact_person_name' => 'required',
            'phone_no' => 'required|min:10|numeric',
            'email' => 'required',
            'password' => 'required',
            'website' => 'required',
            'industry' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'allocated_area' => 'required',
            'created_date' => 'required',
            'verified_date' => 'required',
        ], [
            'required' => 'The field is required.',
            'unique' => ':attribute is already used',
        ]);


        $lastData = DB::table('users')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';

        $franchise = new User();
        $franchise->user_type = 'franchise';
        $franchise->code = $this->generateNumber($lastFrNo, $stateCode);
        $franchise->state_id = $request->post('state_id');
        $franchise->district_id = $request->post('district_id');
        $franchise->city_id = $request->post('city_id');
        $franchise->name = $request->post('contact_person_name');
        $franchise->contact_person_name = $request->post('contact_person_name');
        $franchise->phone_no = $request->post('phone_no');
        $franchise->company_name = $request->post('company_name');
        $franchise->contact_email = $request->post('contact_email');
        $franchise->email = $request->post('email');
        $franchise->website = $request->post('website');
        $franchise->industry = $request->post('industry');
        $franchise->allocated_area = $request->post('allocated_area');
        $franchise->email = $request->post('email');
        $franchise->password = bcrypt($request->post('password'));
        $franchise->created_date = date('Y-m-d', strtotime($request->post('created_date')));
        $franchise->verified_date = date('Y-m-d', strtotime($request->post('verified_date')));
        $franchise->address = $request->post('address');
        $franchise->address_1 = $request->post('address_1');
        $franchise->created_by = Auth::id();
        $franchise->save();

        Session::flash('success', 'franchise created successfully');
        return redirect(route('franchises.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Franchise $franchise
     * @return \Illuminate\Http\Response
     */
    public function show(Franchise $franchise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Franchise $franchise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $franchise = User::find($id);
        $state = State::all();
        $district = District::where('state_id', $franchise->state_id)->get();
        $city = City::where('state_id', $franchise->state_id)->get();
        return view('master.franchise.create')->with(compact('district', 'state', 'city', 'franchise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Franchise $franchise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'company_name' => 'required|unique:users,company_name,' . $id . ',id',
                'contact_person_name' => 'required',
                'phone_no' => 'required|min:10|numeric',
                'website' => 'required',
                'industry' => 'required',
                'state_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
                'allocated_area' => 'required',
                'created_date' => 'required',
                'verified_date' => 'required',
            ],
            [
                'required' => 'The field is required.',
                'unique' => ':attribute is already used',
            ]
        );


        $lastData = DB::table('users')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';


        $franchise = User::find($id);
        $franchise->code = $this->generateNumber($lastFrNo, $stateCode);
        $franchise->state_id = $request->post('state_id');
        $franchise->district_id = $request->post('district_id');
        $franchise->city_id = $request->post('city_id');
        $franchise->name = $request->post('contact_person_name');
        $franchise->contact_person_name = $request->post('contact_person_name');
        $franchise->phone_no = $request->post('phone_no');
        $franchise->company_name = $request->post('company_name');
        $franchise->contact_email = $request->post('contact_email');
        $franchise->email = $request->post('email');
        $franchise->website = $request->post('website');
        $franchise->industry = $request->post('industry');
        $franchise->allocated_area = $request->post('allocated_area');
        $franchise->created_date = date('Y-m-d', strtotime($request->post('created_date')));
        $franchise->verified_date = date('Y-m-d', strtotime($request->post('verified_date')));
        $franchise->address = $request->post('address');
        $franchise->address_1 = $request->post('address_1');
        $franchise->created_by = Auth::id();
        $franchise->save();
        Session::flash('success', 'franchise updated successfully');
        return redirect(route('franchises.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Franchise $franchise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('error', 'franchise deleted successfully');
        return redirect(route('franchises.index'));
    }

    function generateNumber($lastNumber, $code)
    {
        $prefix = 'FR';
        $lastNumber = (int)preg_replace('/\D/', '', $lastNumber);
        $number = str_replace($prefix, '', $lastNumber ?? 0) + 1;
        $lengthOfNumber = strlen($number);
        $numberOfZeros = 5 - $lengthOfNumber;
        $totalLength = $numberOfZeros + $lengthOfNumber;
        $invoiceNumber = str_pad($number, $totalLength, '0', STR_PAD_LEFT);
        return $code . '-' . $prefix . $invoiceNumber;
    }
}
