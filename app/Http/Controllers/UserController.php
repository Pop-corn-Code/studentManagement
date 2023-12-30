<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Student;

class UserController extends Controller
{

    public function login(Request $req){
        
        // dd($req->input('student'));
        if($req->input('student')){
            $email = $req->input('email');
            $pwd = $req->input('password');

            $student = Student::where("email", $email)->where("gr_NO", $pwd)->first();
            // dd($student);
            if($student){
                $req->session()->put('email', $student->email);
                $req->session()->put('name', $student->name());
                session()->flash('success', 'Success message here');
                return redirect()->route('student')->with('success', 'Register in successfully ');
            }else{
                session()->flash('warning', 'Something wrong when saving your information ');
                return back()
                ->withInput();  // To repopulate the form with old input data
            }
          
        }else{
            $email = $req->input('email');
            $pwd = $req->input('password');

            $student = Student::where("email", $email)->where("password", $pwd)->first();
             
        }
    }

    /***
     * Log-out function
     */
    public function logout(Request $req){
        $req->session()->flush();
        return redirect()->route('login.form');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
