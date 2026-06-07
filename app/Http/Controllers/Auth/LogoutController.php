<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store(){
        // Auth::logout();
        // return redirect('/');
        // yahan talk bhi sahi tha agar offline na dikhana rahe yahi tak sahi 


         $user = Auth::user();

    if ($user) {
        $user->login_status = 'offline';
        $user->save();
    }

    Auth::logout();

    return redirect('/');
    }
}
