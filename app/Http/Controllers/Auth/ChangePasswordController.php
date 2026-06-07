<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ChangePasswordController extends Controller
{

public function index(){
    return view('auth.changepassword');
}

    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'], // Current password check
           'newpassword' => ['required', 'string', 'min:6'],
            'renewpassword' => ['required', 'same:newpassword'], // Confirm password check
        ]);

        // Update Password
        $user = Auth::user();
        $user->password = Hash::make($request->newpassword);
        $user->save();
        
        Alert::success('Success', 'Password changed successfully!');

        return redirect()->route('dashboard');
    }
}
