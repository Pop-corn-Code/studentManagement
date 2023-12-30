<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Student;

class AttendanceController extends Controller
{
    /**
     * CALL FUNCTION
     */
    public function call(Request $req){
        // dd($req);
        $teacher = Teacher::where('email', $req->session()->get('email'))->first();
        $students = Student::where("semester", $req->input('semester'))->get();
        return view('call', [
            'sem'=>$req->input('semester'),
            'teacher'=>$teacher,
            'students'=>$students
        ]);
    }
    /**
     * Take student attendance
     */
    public function take_attendance(Request $req, $sem){
        // dd($req);
        $teacher = Teacher::where('email', $req->session()->get('email'))->first();
                    // dd($teacher->id);
        $students = Student::where("semester", $sem)->get();
        // dd($students);
        foreach($students as $std){
            if($req->input('status'.$std->id)){
                $attendance = Attendance::where("student_id", $std->id)->where("teacher_id", $teacher->id)->where("course_name", $teacher->course_name)->first();
                // dd($attendance);
                if($attendance){
                    $attendance->update([
                        "status"=>(int)$attendance->status + 1,
                        "total_hours"=>(int)$attendance->total_hours + 1
                    ]);
                }else{
                    Attendance::create([
                        "status"=>'1',
                        "course_name"=>$teacher->course_name,
                        "teacher_id"=>$teacher->id,
                        "student_id"=>$std->id,
                        "total_hours"=>'1'
                    ]);
                }
            }else{
                $attendance = Attendance::where("student_id", $std->id)->where("teacher_id", $teacher->id)->where("course_name", $teacher->course_name)->first();
                if($attendance){
                    $attendance->update([
                        "total_hours"=>(int)$attendance->total_hours + 1
                    ]);
                }else{
                    Attendance::create([
                        "status"=>'0',
                        "course_name"=>$teacher->course_name,
                        "teacher_id"=>$teacher->id,
                        "student_id"=>$std->id,
                        "total_hours"=>'1'
                    ]);
                }
            }
        }
        return redirect()->route('students');

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
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
