<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request->file('photo'));
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'phone' => 'required|unique:users,phone|digits_between:10,20',

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,

        ];

        // if ($request->hasFile('file')) {
        //     $fileName = time() . '.' . $request->file->extension();
        //     $request->file->move(public_path('img'), $fileName);
        //     $data['file'] = $fileName;
        // }
        $user = User::create($data);
        //    dd($user);
        Alert::success('Success', 'Account Created Successfully');
        return redirect()->route('login');
    }
}
