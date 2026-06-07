<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $search = $request->search;

    $students = Student::when($search, function ($query) use ($search) {

        $query->where('first_name', 'LIKE', "%{$search}%")
              ->orWhere('last_name', 'LIKE', "%{$search}%")
              ->orWhereRaw("CONCAT(first_name,' ',last_name) LIKE ?", ["%{$search}%"])
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('phone', 'LIKE', "%{$search}%")
              ->orWhere('roll_no', 'LIKE', "%{$search}%");

    });

    $students->orderBy(
        $request->sort ?? 'id',
        $request->direction ?? 'desc'
    );

    $students = $students->paginate(2);

    return view('student.list', compact('students'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.add');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'first_name'   => 'required',
        'last_name'    => 'required',
        'father_name'  => 'required',
        'class'        => 'required',
        'subject'      => 'required',
        'email'        => 'required|email|unique:students,email',
        'password'     => 'required|min:8|max:12|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
        'phone'        => 'required|digits_between:10,15',
        'roll_no'      => 'required',
        'gender'       => 'required',
        'dob'          => 'required|date',
        'file'        => 'required|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        'address'      => 'required',
        'description'  => 'required',
        'status'       => 'required'
    ]);

    // FILE UPLOAD
    $fileName = null;

    if ($request->hasFile('file')) {
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads/students'), $fileName);
       
    }

    // SAVE DATA
    $student = Student::create([
        'first_name'   => $request->first_name,
        'last_name'    => $request->last_name,
        'father_name'  => $request->father_name,
        'class'        => $request->class,
        'subject'      => $request->subject,
        'email'        => $request->email,
        'password'     => Hash::make($request->password),
        'phone'        => $request->phone,
        'roll_no'      => $request->roll_no,
        'gender'       => $request->gender,
        'dob'          => $request->dob,
        'file'        =>  $fileName,
        'address'      => $request->address,
        'description'  => $request->description,
        'status'       => $request->status,
    ]);

    Alert::success('Success', 'Student Added Successfully.');

    return redirect()->route('student.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        Alert::info('Edit Mode', 'You are now editing student details.');
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
   
       public function update(Request $request, Student $student)
{
    $request->validate([
        'first_name'   => 'required',
        'last_name'    => 'required',
        'father_name'  => 'required',
        'class'        => 'required',
        'subject'      => 'required',
        'email'        => 'required|email|unique:students,email,'.$student->id,
        'phone'        => 'required|digits_between:10,15',
        'roll_no'      => 'required',
        'gender'       => 'required',
        'dob'          => 'required|date',
        'address'      => 'required',
        'description'  => 'required',
        'status'       => 'required',
    ]);

    // PASSWORD (optional update)
    if ($request->password) {
        $request->validate([
            'password' => 'min:8|max:12|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
        ]);

        $student->password = Hash::make($request->password);
    }

    // FILE UPDATE
    if ($request->hasFile('file')) {

        // old delete
        if ($student->file && file_exists(public_path('uploads/students/'.$student->file))) {
            unlink(public_path('uploads/students/'.$student->file));
        }

        // new upload
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads/students'), $fileName);
      

        $student->file = $fileName;
    }

    // UPDATE FIELDS
    $student->first_name  = $request->first_name;
    $student->last_name   = $request->last_name;
    $student->father_name = $request->father_name;
    $student->class       = $request->class;
    $student->subject     = $request->subject;
    $student->email       = $request->email;
    $student->phone       = $request->phone;
    $student->roll_no     = $request->roll_no;
    $student->gender      = $request->gender;
    $student->dob         = $request->dob;
    $student->address     = $request->address;
    $student->description = $request->description;
    $student->status      = $request->status;

    $student->save();

    Alert::success('Success', 'Student Updated Successfully');

    return redirect()->route('student.index');
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // delete file
        if ($student->file && file_exists(public_path('uploads/students/'.$student->file))) 
     {
        unlink(public_path('uploads/students/'.$student->file));
     }
    
        $student->delete();
        Alert::success('Deleted', 'Student Deleted Successfully.');
        return redirect()->route('student.index');
    }
}
