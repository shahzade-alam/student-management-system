<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index()
    // {

    //     return view('dashboard');
    // }

    public function index()
{
    $students = User::latest()->get();

    $totalStudents = User::count();

    $activeUsers = User::where('login_status', 'online')->count();
    $inactiveUsers = User::where('login_status', 'offline')->count();
    

    return view('dashboard', compact(
        'students',
        'totalStudents',
        'activeUsers',
        'inactiveUsers'
    ));
}
}
