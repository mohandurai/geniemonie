<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\StateManagerCommision;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StateManagerCommisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = StateManagerCommision::all()->first();
        return view('master.state-manager-commission.create')->with(compact('state'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'direct_ad' => 'required',
            'fran_paid_ad' => 'required'
        ], [
            'direct_ad.required' => 'Direct ad approval commission is required',
            'fran_paid_ad.required' => 'franchise paid Ad approval commission is required'
        ]);

        $stateManagerCommission = new StateManagerCommision();
        $stateManagerCommission->direct_ad = $request->post('direct_ad');
        $stateManagerCommission->fran_paid_ad = $request->post('fran_paid_ad');
        $stateManagerCommission->user_id = Auth::id();
        $stateManagerCommission->save();
        Session::flash('success', 'State Manager Commissions created successfully');
        return redirect(route('state-manager-commission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\StateManagerCommision $stateManagerCommision
     * @return \Illuminate\Http\Response
     */
    public function show(StateManagerCommision $stateManagerCommission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StateManagerCommision $stateManagerCommision
     * @return \Illuminate\Http\Response
     */
    public function edit(StateManagerCommision $stateManagerCommission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StateManagerCommision $stateManagerCommision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateManagerCommision $stateManagerCommission)
    {
        $validated = $request->validate([
            'direct_ad' => 'required',
            'fran_paid_ad' => 'required'
        ]);
        $stateManagerCommission->direct_ad = $request->post('direct_ad');
        $stateManagerCommission->fran_paid_ad = $request->post('fran_paid_ad');
        $stateManagerCommission->user_id = Auth::id();
        $stateManagerCommission->save();
        Session::flash('warning', 'State Manager Commissions updated successfully');
        return redirect(route('state-manager-commission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StateManagerCommision $stateManagerCommision
     * @return \Illuminate\Http\Response
     */
    public function destroy(StateManagerCommision $stateManagerCommission)
    {
        //
    }
}
