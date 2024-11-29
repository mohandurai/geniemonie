<?php

namespace App\Http\Controllers;

use App\Models\AdPackage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use DB;

class AdPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = AdPackage::paginate(10);
        //  echo "<pre>";
        // print_r($package);
        // echo "</pre>";
        // exit; 
        return view('master.ad-package.index')->with(compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.ad-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $pkgDisct = DB::table('package_discount')->select('months_3','months_6','year_1')->where('id','=','1')->get();
        // echo "<pre>";
        // print_r($pkgDisct);
        // echo "</pre>";
        // exit; 

        $validated = $request->validate([
            'package_name' => 'required|unique:ad_packages,package_name',
            'package_zone' => 'required',
            'ad_type' => 'required',
            // 'yr1_price' => 'required',
            // 'mth6_price' => 'required',
            // 'mth3_price' => 'required',
            'ad_seconds' => 'required',
            'price_mth' => 'required',
        ]);

        try {

            $mth3amt = $request->post('price_mth') * 3;
            $mth6amt = $request->post('price_mth') * 6;
            $yr1amt = $request->post('price_mth') * 12;

            $package = new AdPackage();
            $package->price_mth =  $request->post('price_mth');
            $package->yr1_price =  $yr1amt;
            $package->mth6_price =  $mth6amt;
            $package->mth3_price =  $mth3amt;
            $package->ad_type =  $request->post('ad_type');
            $package->package_name =  $request->post('package_name');
            $package->ad_seconds =  $request->post('ad_seconds');
            $package->package_zone =  $request->post('package_zone');
            $package->user_id = Auth::id();
            $package->save();
            $request->session()->flash('success', 'Ad Package created successfully');
            return redirect(route('ad-packages.index'));
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdPackage  $adPackage
     * @return \Illuminate\Http\Response
     */
    public function show(AdPackage $adPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdPackage  $adPackage
     * @return \Illuminate\Http\Response
     */
    
     public function editItem(Request $request, $id)
     {
        
        $pkgdis = DB::table('package_discount')->select('months_3','months_6','year_1')->where('id','=',1)->get();
         
        // echo "<pre>";
        // print_r($pkgdis);
        // echo "</pre>";
        // exit; 

        $mth3dnt = $pkgdis[0]->months_3;
        $mth6dnt = $pkgdis[0]->months_6;
        $yr1dnt = $pkgdis[0]->year_1;

        foreach($request->price_mth as $apdid => $value)
        {
            $mth3amt1 = ($value * 3) * ($mth3dnt/100);
                $mth3amt2 = ($value * 3) - $mth3amt1;
            $mth6amt1 = ($value * 6) * ($mth6dnt/100);
                $mth6amt2 = ($value * 6) - $mth6amt1;
            $yr1amt1 = ($value * 12) * ($yr1dnt/100);
                $yr1amt2 = ($value * 12) - $yr1amt1;

            DB::table('ad_packages')->where('adp_id',$apdid)->update(
                [
                    'price_mth'  =>   $value,
                    'mth3_price'  =>   $mth3amt2,
                    'mth6_price'  =>   $mth6amt2,
                    'yr1_price'  =>   $yr1amt2
                ]
            );
        }

        return redirect(route('ad-packages.index'));
     }
    
     public function edit(Request $request, $id)
    {
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";
        echo $id;
        exit;

        // $package = AdPackage::find($id);
        $AdpkgInput = DB::table('ad_packages')->select('adp_id','ad_type','package_name','ad_seconds','package_zone','price_mth','mth3_price','mth6_price','yr1_price')->where('adp_id', $id)->get();
        

        $pkgdis = DB::table('package_discount')->select('months_3','months_6','year_1')->where('id','=',1)->get();

        $mth3dnt = $pkgdis[0]->months_3;
        $mth6dnt = $pkgdis[0]->months_6;
        $yr1dnt = $pkgdis[0]->year_1;

        $mth3amt = ($request->price_mth - ($request->price_mth * ($mth3dnt/100))) * 3;
        $mth6amt = ($request->price_mth - ($request->price_mth * ($mth6dnt/100))) * 6;
        $yr1amt = ($request->price_mth - ($request->price_mth * ($yr1dnt/100))) * 12;

        DB::table('ad_packages')->where('adp_id',$id)->update(
            [
                'price_mth'  =>   $request->price_mth,
                'mth3_price'  =>   $mth3amt,
                'mth6_price'  =>   $mth6amt,
                'yr1_price'  =>   $yr1amt
            ]
        );

        return view('master.ad-package.index');
    }

    public function editPrice(Request $request, $id)
    {
        $pkgdis = DB::table('package_discount')->select('months_3','months_6','year_1')->where('id','=',$id)->get();

        $mth3dnt = $pkgdis[0]->months_3;
        $mth6dnt = $pkgdis[0]->months_6;
        $yr1dnt = $pkgdis[0]->year_1;

        // echo $mth3dnt . " <<<===== " . $mth6dnt . " <<<===== " . $yr1dnt;
        // exit;

        $mth3amt = ($request->price_mth - ($request->price_mth * ($mth3dnt/100))) * 3;
        $mth6amt = ($request->price_mth - ($request->price_mth * ($mth6dnt/100))) * 6;
        $yr1amt = ($request->price_mth - ($request->price_mth * ($yr1dnt/100))) * 12;

        DB::table('ad_packages')->where('adp_id',$id)->update(
            [
                'price_mth'  =>   $request->price_mth,
                'mth3_price'  =>   $mth3amt,
                'mth6_price'  =>   $mth6amt,
                'yr1_price'  =>   $yr1amt
            ]
        );
        
        return redirect(route('ad-packages.index'))->with('message', 'AdPackage Price updated successfully.');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdPackage  $adPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdPackage $adPackage)
    {
        $validated = $request->validate([
            'package_name' => 'required|unique:ad_packages,package_name,'. $adPackage->adp_id . ',adp_id',
            'price_mth' => 'required',
            'mth3_price' => 'required',
            'mth6_price' => 'required',
            'yr1_price' => 'required',
            'package_duration' => 'required',
            'ad_seconds' => 'required',
            'ad_type' => 'required',
            'package_zone' => 'required',
        ]);
        $adPackage->price_mth =  $request->post('price_mth');
        $adPackage->mth3_price =  $request->post('mth3_price');
        $adPackage->mth6_price =  $request->post('mth6_price');
        $adPackage->yr1_price =  $request->post('yr1_price');
        $adPackage->ad_type =  $request->post('ad_type');
        $adPackage->package_name =  $request->post('package_name');
        $adPackage->package_duration =  $request->post('package_duration');
        $adPackage->ad_seconds =  $request->post('ad_seconds');
        $adPackage->package_zone =  $request->post('package_zone');
        $adPackage->user_id = Auth::id();
        $adPackage->save();
        $request->session()->flash('warning', 'Ad Package updated successfully');
        return redirect(route('ad-packages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdPackage  $adPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdPackage::destroy($id);
        Session::flash('error', 'Ad Package Deleted successfully');
        return redirect(route('ad-packages.index'));
    }
}
