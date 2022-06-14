<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.course-list', ['courses' => Course::with('teacher')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores=DB::table('users')->select('users.*')->where('role_id','=',3);
        return view('courses.course-creator', ['profesores'=>$profesores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $profesores = User::where('role_id', '3')->get();
        return view('courses.course-editor', ['course' => $course, 'profesores' => $profesores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'teacher_id' => 'nullable|numeric',
            'init_date' => 'date|date_format:Y-m-d|nullable',
            'end_date' => 'date|date_format:Y-m-d|nullable',
            'enroll_date' => 'date|date_format:Y-m-d|nullable',
            'duration' => 'numeric|nullable',
            'description' => 'required|max:255',
            'cost' => 'nullable|numeric',
            'participantes' => 'nullable|numeric'
        ]);
        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->teacher_id = $request->teacher_id;
        $course->init_date = $request->init_date;
        $course->end_date = $request->end_date;
        $course->enroll_date = $request->enroll_date;
        $course->duration = $request->duration;
        $course->description = $request->description;
        $course->cost = $request->cost;
        $course->participantes = $request->participantes;
        $course->save();
        return redirect()->route('courses')->with('status', 'Couse updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->back()->with('status', 'Course deleted successfully');
    }

    public function participantes($id)
    {
        $users = DB::table('users')
            ->select('users.*')
            ->join('enrollments', 'enrollments.student_id', '=', 'users.id')
            ->join('courses', 'courses.id', '=', 'enrollments.course_id')
            ->where('courses.id', '=', $id)->paginate(5);
        return view('courses.course-user-list', ['users' => $users]);
    }
}
