<?php

namespace App\Http\Controllers;

use App\Models\CallManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CallManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $callManagement = CallManagement::all();
       return view('master.call-management.index')->with(compact('callManagement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.call-management.create');
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
            'company_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'status' => 'required',
        ]);

        $callManagement = new CallManagement();
        $callManagement->name = $request->name;
        $callManagement->company_name = $request->company_name;
        $callManagement->phone_no = $request->phone_no;
        $callManagement->email = $request->email;
        $callManagement->notes = $request->notes;
        $callManagement->status = $request->status;
        $callManagement->save();
        $request->session()->flash('success', 'Call Management created successfully');
        return redirect(route('call-management.index'));
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
        $callManagement = CallManagement::find($id);
        return view('master.call-management.create')->with(compact('callManagement'));
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
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'status' => 'required',
        ]);

        $callManagement = CallManagement::find($id);
        $callManagement->name = $request->name;
        $callManagement->company_name = $request->company_name;
        $callManagement->phone_no = $request->phone_no;
        $callManagement->email = $request->email;
        $callManagement->notes = $request->notes;
        $callManagement->status = $request->status;
        $callManagement->save();
        $request->session()->flash('warning', 'Call Management updated successfully');
        return redirect(route('call-management.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CallManagement::destroy($id);
        Session::flash('error', 'Call Management Deleted successfully');
        return redirect(route('call-management.index'));
    }
}
