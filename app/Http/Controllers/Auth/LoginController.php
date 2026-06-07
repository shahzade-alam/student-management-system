<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email_or_phone' => 'required',
    //         'password' => 'required|min:4',
    //     ]);

    //     $credentials = [
    //         'password' => $request->password,
    //     ];

    //     if (filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL)) {
    //         $credentials['email'] = $request->email_or_phone;
    //     } else {
    //         $credentials['phone'] = $request->email_or_phone;
    //     }

    //     if (Auth::attempt($credentials)) {


    //         $request->session()->regenerate();

    //         Alert::success('Success', 'Login Successfully');

    //         return redirect()->route('dashboard');
    //     }

    //     Alert::error('Error', 'Invalid Email/Phone or Password');

    //     return redirect()->back();
    // }

    // Active/LOGIN STATUS ONLINE SET status dikhane ke liye oyherwise upar wala bhi sahi hai 

    public function store(Request $request)
{
    $request->validate([
        'email_or_phone' => 'required',
        'password' => 'required|min:4',
    ]);

    $credentials = [
        'password' => $request->password,
    ];

    // email ya phone detect
    if (filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL)) {
        $credentials['email'] = $request->email_or_phone;
    } else {
        $credentials['phone'] = $request->email_or_phone;
    }

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        // ✅ LOGIN STATUS ONLINE SET
        $user = Auth::user();
        $user->login_status = 'online';
        $user->save();

        Alert::success('Success', 'Login Successfully');

        return redirect()->route('dashboard');
    }

    Alert::error('Error', 'Invalid Email/Phone or Password');

    return redirect()->back();
}
}
