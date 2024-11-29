<?php

namespace App\Http\Controllers;

use App\Models\FranchiseCommision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FranchisesCommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $franchise = DB::table('franchise_commision')->first();
        return view('master.franchise-commission.create')->with(compact('franchise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fran_paid_ad' => 'required'
        ]);
        $franchise = new FranchiseCommision();
        $franchise->fran_paid_ad =  $request->post('fran_paid_ad');
        $franchise->user_id = Auth::id();
        $franchise->save();
        Session::flash('success', 'franchise commissions created successfully');
        return redirect(route('franchise-commission.index'));
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
        //
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
        $validated = $request->validate([
            'fran_paid_ad' => 'required'
        ]);
        $franchiseCommision = FranchiseCommision::find($id);
        $franchiseCommision->fran_paid_ad =  $request->post('fran_paid_ad');
        $franchiseCommision->user_id = Auth::id();
        $franchiseCommision->save();
        Session::flash('warning', 'franchise commissions updated successfully');
        return redirect(route('franchise-commission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
