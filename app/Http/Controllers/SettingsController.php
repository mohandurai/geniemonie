<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('master.settings.index')->with(compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $image = "";
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $image = Storage::disk('public_uploads')->put('profileImage', $file);
        }
        User::where('id',Auth::user()->id)->update(['name'=>$request->name,'email'=>$request->email,'profile_image'=>$image]);
        $request->session()->flash('warning', 'User Profile has been updated successfully');
        return redirect()->back();
    }
}
