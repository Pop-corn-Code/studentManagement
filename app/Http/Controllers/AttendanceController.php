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
    public function take_attendance(Request $req, $semester){
        dd($semester);
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
