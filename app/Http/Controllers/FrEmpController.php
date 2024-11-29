<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Franchise;
use App\Models\FrEmp;
use App\Http\Controllers\Controller;
use App\Models\Pincode;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FrEmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = User::where('user_type', '=', 'Editor')->orWhere('user_type', '=', 'Telecaller')->paginate(10);
        return view('master.franchise-emp.index')->with(compact('emp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $franchise = User::where('user_type', 'franchise')->get();
        return view('master.franchise-emp.create')->with(compact('franchise'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
            [
                'name' => 'required',
                'user_type' => 'required',
                'fr_id' => 'required',
                'date_of_join' => 'required',
                'education' => 'required',
                'experience' => 'required',
                'state_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
                'address' => 'required',
                'marital_status' => 'required',
                'gender' => 'required',
                'email' => 'required',
                'password' => 'required',
                'father_name' => 'required',
            ],
            [
                'required' => 'The field is required.',
                'unique' => ':attribute is already used',
            ]
        );


        $lastData = DB::table('users')->orderBy('code', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';

        $frEmp = new User();
        $frEmp->code = $this->generateNumber($lastFrNo, $stateCode, $request->post('role'));
        $frEmp->state_id = $request->post('state_id');
        $frEmp->city_id = $request->post('city_id');
        $frEmp->district_id = $request->post('district_id');
        $frEmp->fr_id = $request->post('fr_id');
        $frEmp->name = $request->post('name');
        $frEmp->user_type = $request->post('user_type');
        $frEmp->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $frEmp->education = $request->post('education');
        $frEmp->marital_status = $request->post('marital_status');
        $frEmp->gender = $request->post('gender');
        $frEmp->email = $request->post('email');
        $frEmp->password = bcrypt($request->post('password'));
        $frEmp->experience = $request->post('experience');
        $frEmp->address = $request->post('address');
        $frEmp->address_1 = $request->post('address_1');
        $frEmp->father_name = $request->post('father_name');
        $frEmp->created_by = Auth::id();
        $frEmp->save();
        Session::flash('success', 'Employee Added successfully');
        return redirect(route('franchises-emp.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FrEmp $frEmp
     * @param \App\Models\FrEmp $frEmp
     * @return \Illuminate\Http\Response
     *
     * public function show(FrEmp $frEmp)
     * {
     * //
     * }
     *
     * /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = User::find($id);
        $franchise = User::where('user_type', '=', 'franchise')->get();
        $state = State::all();
        $district = District::where('state_id', $emp->state_id)->get();
        $city = City::where('state_id', $emp->state_id)->get();
        return view('master.franchise-emp.create')->with(compact('district', 'state', 'city', 'franchise', 'emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FrEmp $frEmp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'user_type' => 'required',
                'fr_id' => 'required',
                'date_of_join' => 'required',
                'education' => 'required',
                'experience' => 'required',
                'state_id' => 'required',
                'district_id' => 'required',
                'city_id' => 'required',
                'address' => 'required',
                'marital_status' => 'required',
                'gender' => 'required',
                'father_name' => 'required',
            ],
            [
                'required' => 'The field is required.',
                'unique' => ':attribute is already used',
            ]
        );

        $lastData = DB::table('users')->orderBy('code', 'desc')->first();
        $lastFrNo = $lastData->code ?? '';
        $stateData = DB::table('state')->where('state_id', '=', $request->post('state_id'))->first();
        $stateCode = !empty($stateData->state_code) ? $stateData->state_code : 'ST';



        $frEmp = User::find($id);
        $frEmp->code = $this->generateNumber($lastFrNo, $stateCode, $request->post('role'));
        $frEmp->state_id = $request->post('state_id');
        $frEmp->city_id = $request->post('city_id');
        $frEmp->district_id = $request->post('district_id');
        $frEmp->fr_id = $request->post('fr_id');
        $frEmp->name = $request->post('name');
        $frEmp->user_type = $request->post('user_type');
        $frEmp->date_of_join = date('Y-m-d', strtotime($request->post('date_of_join')));
        $frEmp->education = $request->post('education');
        $frEmp->marital_status = $request->post('marital_status');
        $frEmp->gender = $request->post('gender');
        $frEmp->experience = $request->post('experience');
        $frEmp->address = $request->post('address');
        $frEmp->address_1 = $request->post('address_1');
        $frEmp->father_name = $request->post('father_name');
        $frEmp->created_by = Auth::id();
        $frEmp->save();
        Session::flash('warning', 'Franchises Employee Updated successfully');
        return redirect(route('franchises-emp.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FrEmp $frEmp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FrEmp::destroy($id);
        Session::flash('error', 'Franchises Employee Deleted successfully');
        return redirect(route('franchises-emp.index'));
    }

    function generateNumber($lastNumber, $code, $role)
    {
        $prefix = $role == "editor" ? 'ED' : 'TC';
        $lastNumber = (int)preg_replace('/\D/', '', $lastNumber);
        $number = str_replace($prefix, '', $lastNumber ?? 0) + 1;
        $lengthOfNumber = strlen($number);
        $numberOfZeros = 5 - $lengthOfNumber;
        $totalLength = $numberOfZeros + $lengthOfNumber;
        $invoiceNumber = str_pad($number, $totalLength, '0', STR_PAD_LEFT);
        return $code . '-' . $prefix . $invoiceNumber;
    }

    public function statusChange(Request $request)
    {
        $empId = $request->id;
        if ($empId) {
            $empDetails = User::find($empId);
            if (!empty($empDetails->status) && $empDetails->status == 1) {
                $empDetails->update(['status' => '0']);
                return response()->json(['msg' => 'franchise has been in inactive successfully']);
            } else {
                $empDetails->update(['status' => '1']);
                return response()->json(['msg' => 'franchise has been active successfully']);
            }
        }
    }
}
