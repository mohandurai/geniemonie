<?php

namespace App\Http\Controllers;

use App\Models\ContentWriterCommision;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContentWriterCommisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = DB::table('content_writer_commision')->first();
        return view('master.content-writer-commission.create')->with(compact('content'));
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
            'direct_ad' => 'required',
            'fran_paid_ad' => 'required'
        ]);
        $contentWriterCommision = new ContentWriterCommision();
        $contentWriterCommision->direct_ad =  $request->post('direct_ad');
        $contentWriterCommision->fran_paid_ad =  $request->post('fran_paid_ad');
        $contentWriterCommision->user_id = Auth::id();
        $contentWriterCommision->save();
        Session::flash('success', 'Content Writer Commissions created successfully');
        return redirect(route('content-writer-commission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentWriterCommision  $contentWriterCommision
     * @return \Illuminate\Http\Response
     */
    public function show(ContentWriterCommision $contentWriterCommision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentWriterCommision  $contentWriterCommision
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentWriterCommision $contentWriterCommision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContentWriterCommision  $contentWriterCommision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentWriterCommision $contentWriterCommision)
    {
        $validated = $request->validate([
            'direct_ad' => 'required',
            'fran_paid_ad' => 'required'
        ]);
        $contentWriterCommision->direct_ad =  $request->post('direct_ad');
        $contentWriterCommision->fran_paid_ad =  $request->post('fran_paid_ad');
        $contentWriterCommision->user_id = Auth::id();
        $contentWriterCommision->save();
        Session::flash('warning', 'Content Writer Commissions updated successfully');
        return redirect(route('content-writer-commission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentWriterCommision  $contentWriterCommision
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentWriterCommision $contentWriterCommision)
    {
        //
    }
}
