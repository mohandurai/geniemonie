<?php

namespace App\Http\Controllers;
use App\Models\Packagediscount;
use DB;
use Illuminate\Http\Request;

class PackagediscountController extends Controller
{
    //
    public function index()
    {
        $package = Packagediscount::paginate(10);
        return view('master.packagediscount.index')->with(compact('package'));
    }

    public function create()
    {
        // $pkglists = DB::table('ad_packages')->select('adp_id','package_name')->get();
        // foreach($pkglists as $pkglist) {
        //     $options[$pkglist->adp_id] = $pkglist->package_name;
        // }
        // echo "<pre>";
        // print_r($options);
        // echo "</pre>";
        // exit;
        return view('master.packagediscount.create')->with('pkglist');
    }

    public function store(Request $request)
    {
        
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // exit; 

        $validated = $request->validate([
            'package_id' => 'required|unique:package_discount,package_id',
        ]);
        try {
            $package = new Packagediscount();
            $package->package_id =  $request->post('package_id');
            $package->months_3 =  $request->post('months_3');
            $package->months_6 =  $request->post('months_6');
            $package->year_1 =  $request->post('year_1');
            $package->save();
            $request->session()->flash('success', 'Package Discount created successfully');
            return redirect(route('packagediscount.index'));
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }
    }

    public function edit($id)
    {
        $pkglists = DB::table('ad_packages')->select('adp_id','package_name')->get();
        foreach($pkglists as $pkglist) {
            $options[$pkglist->adp_id] = $pkglist->package_name;
        }

        $package = Packagediscount::find($id);
        return view('master.packagediscount.edit')->with(compact('package'))->with('pkglist',$options);
    }

    public function editDiscount(Request $request, $id)
    {

        DB::table('package_discount')->where('id',$id)->update(
            [
                'months_3'  =>   $request->months_3,
                'months_6'  =>   $request->months_6,
                'year_1'  =>   $request->year_1
            ]
        );

        $pkgdis = DB::table('ad_packages')->select('adp_id','price_mth','mth3_price','mth6_price','yr1_price')->get();

        // echo "<pre>";
        // print_r($pkgdis);
        // echo "</pre>";
        // echo $id;
        

        foreach($pkgdis as $aaa) {
            // echo $aaa->price_mth . "<br>";
            $mth3amt1 = ($aaa->price_mth * 3) * ($request->months_3/100);
            $mth3amt2 = ($aaa->price_mth * 3) - $mth3amt1;
            $mth6amt1 = ($aaa->price_mth * 6) * ($request->months_6/100);
            $mth6amt2 = ($aaa->price_mth * 6) - $mth6amt1;
            $yr1amt1 = ($aaa->price_mth * 12) * ($request->year_1/100);
            $yr1amt2 = ($aaa->price_mth * 12) - $yr1amt1;

            DB::table('ad_packages')->where('adp_id',$aaa->adp_id)->update(
                [
                    'mth3_price'  => $mth3amt2,
                    'mth6_price'  => $mth6amt2,
                    'yr1_price'  =>  $yr1amt2
                ]
            );

        }
        // exit;

        // $mth3amt = ($request->price_mth - ($request->price_mth * $mth3dnt/100)) * 3;
        // $mth6amt = ($request->price_mth - ($request->price_mth * $mth6dnt/100)) * 6;
        // $yr1amt = ($request->price_mth - ($request->price_mth * $yr1dnt/100)) * 12;

        // DB::table('ad_packages')->where('id',$id)->update(
        //     [
        //         'months_3'  =>   $request->months_3,
        //         'months_6'  =>   $request->months_6,
        //         'year_1'  =>   $request->year_1
        //     ]
        // );
        
        return redirect(route('packagediscount.index'))->with('message', 'Package Discount updated successfully.');
    }
}
