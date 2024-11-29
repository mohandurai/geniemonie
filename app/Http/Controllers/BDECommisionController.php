<?php

namespace App\Http\Controllers;

use App\Models\BDECommision;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BDECommisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bde = DB::table('bde_commision')->first();
        return view('master.bde-commission.create')->with(compact('bde'));
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
            'fran_app_ad' => 'required'
        ]);
        $bdeCommission = new BDECommision();
        $bdeCommission->fran_app_ad =  $request->post('fran_app_ad');
        $bdeCommission->user_id = Auth::id();
        $bdeCommission->save();
        Session::flash('success', 'bde commissions created successfully');
        return redirect(route('bde-commission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BDECommision  $bDECommision
     * @return \Illuminate\Http\Response
     */
    public function show(BDECommision $bDECommision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BDECommision  $bDECommision
     * @return \Illuminate\Http\Response
     */
    public function edit(BDECommision $bDECommision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BDECommision  $bDECommision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BDECommision $bDECommision)
    {
        $validated = $request->validate([
            'fran_app_ad' => 'required'
        ]);
        $bDECommision->fran_app_ad =  $request->post('fran_app_ad');
        $bDECommision->user_id = Auth::id();
        $bDECommision->save();
        Session::flash('warning', 'bde commissions updated successfully');
        return redirect(route('bde-commission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BDECommision  $bDECommision
     * @return \Illuminate\Http\Response
     */
    public function destroy(BDECommision $bDECommision)
    {
        //
    }
}
