<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Rules\MatchOldPassword;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getProfile(){
        return view('profile');
    }

     /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author Shani Singh
     */

     public function updateProfile(Request $request){
        $request->validate([
            'fullname'  => 'required',
            'email'     => 'required'
        ]);

        User::whereId(auth()->user()->id)->update([
                'name' => $request->fullname,
                'email' => $request->email,
            ]);

        #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');
     }

     public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        #Update Password
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            
        #Return To Profile page with success
        return back()->with('success', 'Password Changed Successfully.');
            
    }
}
