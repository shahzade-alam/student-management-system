<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = Auth::user();
       return view('student.profile',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $user = Auth::user();

    $data = [
            'name'    => $request->name,
            'class'    => $request->class,
            'roll_no'    => $request->roll_no,
            'email'   => $request->email,
            'phone'  => $request->phone,
            'address'   => $request->address,
            'subject' => $request->subject,
    ];

    if ($request->hasFile('file')) {

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(
            public_path('img'),
            $fileName
        );

        $data['file'] = $fileName;
    }

    $user->update($data);

    return back()->with('success','Profile Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
