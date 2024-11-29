<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index(){
        return view('master.commission.commission');
    }

    public function commissionSave(Request $request){

        echo "<pre>";
        print_r($request->all());exit();
    }
}
