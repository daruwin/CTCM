<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teacher;

class TeacherController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function Data()
    {
    	return Datatables::of(Teacher::query())
    	->addColumn('action', function ($teacher) {
    		return '<a href="classrooms/'.$teacher->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="classrooms.delete/'.$teacher->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
            ';
    	})->make(true);
    }
    
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new Teacher();
        $teacher->firs_name = $request->firs_name;
        $teacher->last_name = $request->last_name;
        $teacher->address = $request->address;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect()->action('TeacherController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $found_teacher = Teacher::where('id', $teacher->id)->first();
        return view('teachers.show')->with('teacher', $found_teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $found_teacher = Teacher::where('id', $teacher->id)->first();
        return view('teachers.edit')->with('teacher', $found_teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $found_teacher = Teacher::find($teacher->id);
        $found_teacher->first_name = $request->first_name;
        $found_teacher->last_name = $request->last_name;
        $found_teacher->address = $request->address;
        $found_teacher->phone = $request->phone;
        $found_teacher->email = $request->email;
        $found_teacher->save();
        return redirect()->action('TeacherController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);
        return redirect()->action('TeacherController@index');
    }
}
