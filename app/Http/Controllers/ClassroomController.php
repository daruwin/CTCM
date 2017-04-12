<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classrooms.index');
    }

    public function Data()
    {
        return Datatables::of(Classroom::query())
        ->addColumn('action', function ($classroom) {
            return '<a href="classrooms/'.$classroom->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="classrooms.delete/'.$classroom->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
            ';
        })->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classroom = new Classroom();
        $classroom->code = $request->code;
        $classroom->capacity = $request->capacity;
        $classroom->save();
        return redirect()->action('ClassroomController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        $found_classroom = Classroom::where('id', $classroom->id)->first();
        return view('classrooms.show')->with('classroom', $found_classroom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $found_classroom = Classroom::where('id', $classroom->id)->first();
        return view('classrooms.edit')->with('classroom', $found_classroom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        $found_classroom = Classroom::find($classroom->id);
        $found_classroom->code = $request->code;
        $found_classroom->capacity = $request->capacity;
        $found_classroom->save();
        return redirect()->action('ClassroomController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        Classroom::destroy($classroom->id);
        return redirect()->action('ClassroomController@index');
    }
}
