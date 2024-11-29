<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.Error.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function show(Emp $emp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function edit(Emp $emp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emp $emp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emp $emp)
    {
        //
    }
}
