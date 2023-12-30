<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Student;
use validator; 

class UserController extends Controller
{
    /**
     * REGISTER FUNCTION
     */
    public function register(Request $req){
        $req->validate([
            'name'=>"required",
            'email'=>"required|email",
            'password'=>"required|min:6",
            'course_name'=>"required"
        ]);
        // dd($req);
        $teacher = new Teacher();
        $teacher->name = $req->input('name');
        $teacher->email = $req->input('email');
        $teacher->password = $req->input('password');
        $teacher->course_name = $req->input('course_name');

        $teacher->save();

        return redirect()->route('login.form')->with('success', 'Successfully registed');
    }
/**
     * Attendance details
     */
    public function login(Request $req){
        
        // dd($req->input('student'));
        if($req->input('student')){
            $email = $req->input('email');
            $pwd = $req->input('password');

            $student = Student::where("email", $email)->where("gr_NO", $pwd)->first();
            // dd($student);
            if($student){
                $total_actual_attendance = 0;
                $total_attendance = 0;
                $percentage = 0;
                $attendances = Attendance::where("student_id", $student->id)->get();
                foreach($attendances as $atd){
                    $total_actual_attendance += (int)$atd->status;
                    $total_attendance += (int)$atd->total_hours;
                }
                $percentage = $total_actual_attendance/$total_attendance * 100;
                $req->session()->put('email', $student->email);
                $req->session()->put('name', $student->name());
                $req->session()->put('total_attendance', $percentage);
                $req->session()->put('attendances', $attendances);
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

            $teacher = Teacher::where("email", $email)->where("password", $pwd)->first();
             if($teacher){
                $req->session()->put('email', $teacher->email);
                $req->session()->put('name', $teacher->name);
                session()->flash('success', 'Success message here');
                return redirect()->route('students')->with('success', 'Login in successfully');
             }else{
                  session()->flash('warning', 'Something wrong when saving your information ');
                    return back()
                    ->withInput();  
             }
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
