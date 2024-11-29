<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\State;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('master.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.users.create');
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
            'user_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required|unique:users',
            'state_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'pincode' => 'required|numeric',
        ]);

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit;

        $qry6 = "SELECT B.state_code FROM `city` A, `state` B WHERE A.pincode='$request->pincode' AND A.`status`='1' AND A.state_id = B.state_id";
        $code2 = DB::select($qry6);
        $stcode = $code2[0]->state_code;

        if($request->user_type == "StateManager") {
            $usercode = $stcode . "-SM";
        } elseif($request->user_type == "CustomerCare") {
            $usercode = $stcode . "-CC";
        } elseif($request->user_type == "ContentWriter") {
            $usercode = $stcode . "-CW";
        } elseif($request->user_type == "BDE") {
            $usercode = $stcode . "-BD";
        } elseif($request->user_type == "Franchise") {
            $usercode = $stcode . "-FR";
        } elseif($request->user_type == "Advertiser") {
            $usercode = $stcode . "-AD";
        } elseif($request->user_type == "Editor") {
            $usercode = $stcode . "-ED";
        } elseif($request->user_type == "Telecaller") {
            $usercode = $stcode . "-TC";
        } else {
            $usercode = $stcode . "-PL";
        }

        $qry7 = "SELECT MAX(SUBSTRING(user_id,6,12)) AS digit FROM `users` where user_id != '' AND SUBSTRING(user_id,1,5) = '$stcode-PL'";
        // echo $qry7;
        // exit;
        $code3 = DB::select($qry7);
        // echo $code3[0]->digit . " <<<====== ";
        // exit;
        if($code3[0]->digit == null) {
            $numpart = 1;
            $intpart = str_pad($numpart, 4, '0', STR_PAD_LEFT);    
        } else {
            $code3a = (int) $code3[0]->digit;
            $numpart = (int) $code3a + 1;
            $intpart = str_pad($numpart, 4, '0', STR_PAD_LEFT);    
        }
        
        $final_user_code = $usercode . $intpart;
        
        // echo $final_user_code . " <<<==== =";
        // exit;

        $user = new User();
        $user->user_type = $request->user_type;
        $user->name = $request->name;
        $user->user_id = $final_user_code;
        $user->email = $request->email;
  	    $user->password = bcrypt($request->password);
        $user->phone_no = $request->phone_no;
        $user->state_id = $request->state_id;
        $user->district_id = $request->district_id;
        $user->city_id = $request->city_id;
        $user->pincode = $request->pincode;
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('success', 'Users created successfully');
        return redirect(route('users.index'));
        
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function roleconvert($id)
    {
        //
        // echo "Role Converted ........ for ID " . $id;
        $allroles = Roles::select('id','name')->get();
        $user = User::where('id',$id)->get();
        foreach($allroles as $role)
        {
            $roles[$role->id] = $role->name;
        }
        $allstat = State::all();
        foreach($allstat as $stat)
        {
            $states[$stat->state_code] = $stat->state_name;
        }
        $userid = $user[0]->user_id;
        $userName = $user[0]->name;

        $qry7 = "SELECT id, `name`, user_id, role_id FROM `users` where SUBSTRING(role_id,4,2) = 'SM'";
        $code3 = DB::select($qry7);
        foreach($code3 as $code2){
            $sminfo[$code2->id]['name'] = $code2->name;
            $sminfo[$code2->id]['role_id'] = $code2->role_id;
        }
        // echo "<pre>";
        // print_r($sminfo);
        // echo "</pre>";
        // exit;
        return view('master.users.roleconvert')->with(compact('userid','states','roles','userName','id','sminfo'));
    }
    
    public function convertRole(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit;

        if($request->role_id == 2) {
            $role_code = "-SM";
        } elseif($request->role_id == 8) {
            $role_code = "-CC";
        } elseif($request->user_type == 3) {
            $role_code = "-CW";
        } elseif($request->user_type == 4) {
            $role_code = "-BD";
        } elseif($request->user_type == 5) {
            $role_code = "-FR";
        } elseif($request->user_type == 9) {
            $role_code = "-AD";
        } elseif($request->user_type == 6) {
            $role_code = "-ED";
        } elseif($request->user_type == 7) {
            $role_code = "-TC";
        } else {
            $role_code = "-XX";
        }
        
        $stcode = $request->state_code;
        $cc = $stcode . $role_code;
        $qry7 = "SELECT MAX(SUBSTRING(role_id,6,12)) AS digit FROM `users` where user_id != '' AND SUBSTRING(role_id,1,5) = '$cc'";
        // echo $qry7;
        // exit;
        $code3 = DB::select($qry7);
        // echo $code3[0]->digit . " <<<====== ";
        // exit;
        if($code3[0]->digit == null) {
            $numpart = 1;
            $intpart = str_pad($numpart, 4, '0', STR_PAD_LEFT);    
        } else {
            $code3a = (int) $code3[0]->digit;
            $numpart = (int) $code3a + 1;
            $intpart = str_pad($numpart, 4, '0', STR_PAD_LEFT);    
        }
       
        $final_role_code = $cc . $intpart;

        $user = User::find($request->uid);
        $user->role_id = $final_role_code;
        $user->save();

        return redirect(route('users.index'));
        
    }

    public function saveRole(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit;
        
        $qry8 = "SELECT MAX(SUBSTRING(role_id,6,12)) AS digit FROM `users`";
        $code6 = DB::select($qry8);
        $newDigit = (int) $code6[0]->digit + 1;
        $intpart = str_pad($newDigit, 4, '0', STR_PAD_LEFT);

        if($request->role_id == 2) {
            
            $smRole_id = $request->st_code . "-SM" .  str_pad($intpart, 4, '0', STR_PAD_LEFT);

            $user = User::find($request->uid);
            $user->role_id = $smRole_id;
            $user->save();
        } else {
            $repto = explode("~~~",$request->sm_code);
            $st3 = substr($repto[1],0,2);

            // echo $st3 . " <<<====== ";
            // exit;

            if($request->role_id == 2) {
                $role_code = "-SM";
            } elseif($request->role_id == 8) {
                $role_code = "-CC";
            } elseif($request->role_id == 3) {
                $role_code = "-CW";
            } elseif($request->role_id == 4) {
                $role_code = "-BD";
            } elseif($request->role_id == 5) {
                $role_code = "-FR";
            } elseif($request->role_id == 9) {
                $role_code = "-AD";
            } elseif($request->role_id == 6) {
                $role_code = "-ED";
            } elseif($request->role_id == 7) {
                $role_code = "-TC";
            } else {
                $role_code = "-XX";
            }

            $othrRole_id = $st3 . $role_code . $intpart;

            // echo $othrRole_id . " <<<===== " . $repto[1];
            // exit;

            $user = User::find($request->uid);
            $user->role_id = $othrRole_id;
            $user->report_to_role_id = $repto[1];
            $user->save();
        }

        Session::flash('success', 'Role ID Updated successfully');
        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $state = State::all();
        $district = District::where('state_id',!empty($user->state_id)?$user->state_id:0)->get();
        $city = City::where('state_id',!empty($user->state_id)?$user->state_id:0)->get();
        // echo "<pre>";
        // print_r($state->all());
        // echo "</pre>";
        // exit;
        return view('master.users.create')->with(compact('user','state','city','district'));
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
            'user_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required|numeric',
            'state_id' => 'required',
            'district_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'pincode' => 'required|numeric',
        ],
        [
            'required' => 'The field is required.',
            'unique'    => ':attribute is already used',
        ]);
        $user = User::find($id);
        $user->user_type = $request->user_type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->state_id = $request->state_id;
        $user->district_id = $request->district_id;
        $user->city_id = $request->city_id;
        $user->pincode = $request->pincode;
        $user->save();
        Session::flash('warning', 'Users updated successfully');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('success', 'Users Deleted successfully');
       return redirect(route('users.index'));
    }

    public function delete($id)
    {
        User::destroy($id);
        Session::flash('success', 'Users Deleted successfully');
       return redirect(route('users.index'));
    }

    public function userStatusChange($id){
        $user = User::find($id);
        if (!empty($user) && $user->approved_status == 'Y'){
            $user->update(['approved_status'=>'N','user_type'=>'Player']);
        }
        else{
            $user->update(['approved_status'=>'Y']);
        }
        Session::flash('success', 'Users Status Change successfully');
        return back();
    }
}
