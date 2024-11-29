<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = State::all();
        return view('master.state.index')->with(compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.state.create');
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
            'state_name' => 'required|unique:state,state_name',
            'state_code' => 'required|unique:state,state_code',
        ]);

        $state = new State();
        $state->state_name =  $request->post('state_name');
        $state->state_code =  $request->post('state_code');
        $state->user_id = Auth::id();
        $state->save();

        $request->session()->flash('success', 'state has been created successfully');
        return redirect(route('state.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);
        return view('master.state.create')->with(compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
         $request->validate([
            'state_name' => 'required|unique:state,state_name,'. $state->state_id . ',state_id',
            'state_code' => 'required|unique:state,state_code,'. $state->state_id . ',state_id'
        ]);
        $state->state_name =  $request->post('state_name');
        $state->state_code =  $request->post('state_code');
        $state->user_id = Auth::id();
        $state->save();
        $request->session()->flash('warning', 'state has been updated successfully');
        return redirect(route('state.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        State::destroy($id);
        $request->session()->flash('danger', 'state has been deleted successfully');
        return redirect(route('state.index'));
    }

    public function statusChange(Request $request){
        $stateId = $request->state_id;
        if ($stateId){
            $stateDetails = State::find($stateId);
            if (!empty($stateDetails->status) && $stateDetails->status == 1) {
                $stateDetails->update(['status' => '0']);
                return response()->json(['msg'=>'State status in-active successfully']);
            } else {
                $stateDetails->update(['status' => '1']);
                return response()->json(['msg'=>'State status active successfully']);
            }
        }
    }
}
