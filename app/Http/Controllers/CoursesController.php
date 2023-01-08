<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $courses = Course::orderBy('level', 'asc')->get();
        return view('admin.courses.index', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|min:7|max:8|unique:courses,code',
            'title' => 'required|max:100',
            'level' => 'required|numeric|max:500',
            'units' => 'required|numeric|max:4'
        ]);

        Course::create([
            'code' => Str::upper($request->code),
            'title' => $request->title,
            'level' => $request->level,
            'units' => $request->units,
            'semester' => $request->semester,
            'students' => $request->students
        ]);

        return redirect(route('courses.index'))->with('message', 'Course '.strtoupper($request->code).' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        return view('admin.courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|min:7|max:8',
            'title' => 'required|max:100',
            'level' => 'required|numeric|max:500',
            'units' => 'required|numeric|max:4'
        ]);

        Course::where('id', $id)->update([
            'code' => Str::upper($request->code),
            'title' => $request->title,
            'level' => $request->level,
            'units' => $request->units,
            'semester' => $request->semester,
            'students' => $request->students
        ]);

        return redirect(route('courses.index'))->with('message', 'Course '.strtoupper($request->code).' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/admin/courses')->with('message', 'Course '.$course->code.' deleted!');
    }
}
