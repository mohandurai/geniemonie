<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CustomerCare;
use App\Models\District;
use App\Models\Franchise;
use App\Models\Pincode;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomerCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerCare = User::where('user_type','=','CustomerCare')->paginate(10);
        return view('master.customer-care.index')->with(compact('customerCare'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.customer-care.create');
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

        $lastData = User::where('user_type','CustomerCare')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code)?$stateData->state_code:'ST';

        $customerCare = new User();
        $customerCare->user_type = 'CustomerCare';
        $customerCare->code =  $this->generateNumber($lastFrNo, $stateCode);
        $customerCare->state_id = $request->post('state_id');
        $customerCare->district_id = $request->post('district_id');
        $customerCare->city_id = $request->post('city_id');
        $customerCare->name = $request->post('name');
        $customerCare->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $customerCare->education = $request->post('education');
        $customerCare->marital_status = $request->post('marital_status');
        $customerCare->gender = $request->post('gender');
        $customerCare->email = $request->post('email');
        $customerCare->password = bcrypt($request->post('password'));
        $customerCare->experience =$request->post('experience');
        $customerCare->address = $request->post('address');
        $customerCare->address_1 = $request->post('address_1');
        $customerCare->father_name = $request->post('father_name');
        $customerCare->created_by = Auth::id();
        $customerCare->save();
        Session::flash('success', 'Customer care Added successfully');
        return redirect(route('customer-care.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerCare $customerCare)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customerCare = User::find($id);
        $franchise = User::where('user_type','=','Franchise')->get();
        $state = State::all();
        $district = District::where('state_id',!empty($customerCare->state_id)?$customerCare->state_id:0)->get();
        $city = City::where('state_id',!empty($customerCare->state_id)?$customerCare->state_id:0)->get();
        return view('master.customer-care.create')->with(compact('district', 'state', 'city',  'franchise','customerCare'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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

	$lastData = User::where('user_type','CustomerCare')->orderBy('id', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code)?$stateData->state_code:'ST';

        $customerCare = User::find($id);
	$customerCare->code =  $this->generateNumber($lastFrNo, $stateCode);
        $customerCare->state_id = $request->post('state_id');
        $customerCare->district_id = $request->post('district_id');
        $customerCare->city_id = $request->post('city_id');
        $customerCare->name = $request->post('name');
        $customerCare->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $customerCare->education = $request->post('education');
        $customerCare->marital_status = $request->post('marital_status');
        $customerCare->gender = $request->post('gender');
        $customerCare->experience =$request->post('experience');
        $customerCare->address = $request->post('address');
        $customerCare->address_1 = $request->post('address_1');
        $customerCare->father_name = $request->post('father_name');
        $customerCare->created_by = Auth::id();
        $customerCare->save();
        Session::flash('success', 'Customer care Updated successfully');
        return redirect(route('customer-care.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerCare  $customerCare
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('user_type','=','CustomerCare')->delete($id);
        Session::flash('success', 'Customer care Deleted successfully');
        return redirect(route('customer-care.index'));
    }

    function generateNumber($lastNumber, $code)
    {
        $prefix = 'CC';
        $lastNumber = (int)preg_replace('/\D/', '', $lastNumber);
        $number = str_replace($prefix, '', $lastNumber ?? 0) + 1;
        $lengthOfNumber = strlen($number);
        $numberOfZeros = 5 - $lengthOfNumber;
        $totalLength = $numberOfZeros + $lengthOfNumber;
        $invoiceNumber = str_pad($number, $totalLength, '0', STR_PAD_LEFT);
        return $code. '-' . $prefix . $invoiceNumber;
    }
}
