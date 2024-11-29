<?php

namespace App\Http\Controllers;

use App\Models\BDE;
use App\Models\City;
use App\Models\CWManager;
use App\Models\Franchise;
use App\Models\Pincode;
use App\Models\SManager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $data['total_users'] = User::where('user_type','=','User')->count();
        $data['total_franchises'] =User::where('user_type','=','Franchise')->count();
        $data['total_bde'] = User::where('user_type','=','BDE')->count();
        $data['total_state_manager'] = User::where('user_type','=','StateManagerr')->count();
        $data['total_content_writer'] = User::where('user_type','=','ContentWriter')->count();
        $data['total_ads'] = 0;
        return view('home')->with(compact('data'));
    }


    public function userStatusChange(Request $request)
    {
        if ($request->user_id) {
            $user = User::find($request->user_id);
            if (!empty($user->status) && $user->status == 1) {
                $user->update(['status' => '0']);
                return response()->json(['msg' => 'Your Status has been in inactive successfully']);
            } else {
                $user->update(['status' => '1']);
                return response()->json(['msg' => 'Your Status has been active successfully']);
            }
        }
    }
}
