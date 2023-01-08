<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
      
        // return redirect('')->with('message', 'Please update your profile to continue');
        return view('auth.profile', [
            'user' => $user,
            'status' => 'Please update your profile to continue'
        ]);
    }

    public function update(Request $request) {
        Profile::where('user_id', auth()->user()->id)->update([
            'title' => $request->title
        ]);

        return redirect('/home')->with('status', 'Profile Updated!');
    }
}