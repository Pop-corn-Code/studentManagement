<?php

namespace App\Http\Controllers;

use validator;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //index
    public function index(){
        $students = Student::latest()->paginate(5);
        return view('index', compact("students"));
    }

    //store
    public function store(Request $req){
        $req->validate([
            'firstname'=>'required',
            'lastname'=>"required",
            'email'=>"required|email",
            'address'=>"required",
            'phone'=>"required|min:10",
            'semester'=>"numeric"
        ]);
         
        $student = new Student();
        $student->firstname = $req->input("firstname");
        $student->lastname = $req->input("lastname");
        $student->email = $req->input("email");
        $student->address = $req->input("address");
        $student->phone = $req->input("phone");
        $student->semester = $req->input("semester");
        
        $student->save();

        return redirect()->route('students')->with('success', 'Student added successfully');

    
    }
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();   
        return view('edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
       $request->validate([
            'firstname'=>'required',
            'lastname'=>"required",
            'email'=>"required|email",
            'address'=>"required",
            'phone'=>"required|min:10",
            'semester'=>"numeric"
       ]);

       $input = $request->all();


        $student->update($input);

        return redirect()->route('students')->with('success', 'Student updated successfully');	
    }


    //delete function
    public function delete($id){
       $student = Student::where("id", $id);
       $student->delete();
       return redirect()->route('students')->with('success', 'Student deleted successfully'); 
    }
}
