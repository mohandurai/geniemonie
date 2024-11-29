<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cms = DB::table('cms')->first();
        return view('master.cms.create')->with(compact('cms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [];
        $type = $request->type;
        if ($type == 'Screen1') {
            if ($request->hasFile('screen_one_image')) {
                $file = $request->file('screen_one_image');
                $image = Storage::disk('public_uploads')->put('Screen1', $file);
            }
            $data = [
                'screen_one_image' => !empty($image)?$image:'',
                'screen_one_content' => $request->screen_one_content,
            ];
        } elseif ($type == 'Screen2') {
            if ($request->hasFile('screen_two_image')) {
                $file = $request->file('screen_two_image');
                $image = Storage::disk('public_uploads')->put('Screen2', $file);
            }
            $data = [
                'screen_two_image' => !empty($image)?$image:'',
                'screen_two_content' => $request->screen_two_content,
            ];
        } elseif ($type == 'Screen3') {
            if ($request->hasFile('screen_three_image')) {
                $file = $request->file('screen_three_image');
                $image = Storage::disk('public_uploads')->put('Screen3', $file);
            }
            $data = [
                'screen_three_image' => !empty($image)?$image:'',
                'screen_three_content' => $request->screen_three_content,
            ];
        } elseif ($type == 'Bde') {
            if ($request->hasFile('bde_image')) {
                $file = $request->file('bde_image');
                $image = Storage::disk('public_uploads')->put('bde', $file);
            }
            $data = [
                'bde_image' => !empty($image)?$image:'',
                'bde_question' => $request->bde_question,
                'bde_answer' => $request->bde_answer,
            ];
        } elseif ($type == 'Franchise') {
            if ($request->hasFile('franchise_image')) {
                $file = $request->file('franchise_image');
                $image = Storage::disk('public_uploads')->put('franchise', $file);
            }
            $data = [
                'franchise_image' => !empty($image)?$image:'',
                'franchise_question' => $request->franchise_question,
                'franchise_answer' => $request->franchise_answer,
            ];
        } elseif ($type == 'Advertise') {
            if ($request->hasFile('advertise_image')) {
                $file = $request->file('advertise_image');
                $image = Storage::disk('public_uploads')->put('Advertise', $file);
            }
            $data = [
                'advertise_image' => !empty($image)?$image:'',
                'advertise_question' => $request->advertise_question,
                'advertise_answer' => $request->advertise_answer
            ];
        }

        $matchThese = ['cms_id' => 1];
        Cms::updateOrCreate($matchThese, $data);
        $request->session()->flash('warning', 'Cms content has been updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
