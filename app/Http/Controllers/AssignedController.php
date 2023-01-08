<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Assigned;
use Illuminate\Http\Request;

class AssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $staffs = User::all();

        return view('admin.assign.index', [
            'staffs' => $staffs,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $staffs = User::all();
        
        return view('admin.assign.create', [
            'courses' => $courses,
            'staffs' => $staffs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Assigned::create([
            'course_id'=>$request->course_id,
            'user_id'=>$request->user_id
        ]);

        return redirect('/admin/assign')->with('message', 'Course assigned!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function show(Assigned $assigned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function edit(Assigned $assigned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assigned $assigned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigned  $assigned
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assigned $assigned)
    {
        //
    }
}
