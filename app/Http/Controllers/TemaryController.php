<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Temary;

class TemaryController extends Controller
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
	$temary = Temary::all();
	return view('temaries.index')->with('temaries', $temaries);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
	return view('temaries.create');
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
    {
        $temary = new Temary();
        $temary->save();
        return redirect()->action('TemaryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Temary $temary)
    {
        $found_temary = Temary::where('id', $temary->id)->first();
        return view('temaries.show')->with('temary', $found_temary);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Temary $temary)
    {
        $found_temary = Temary::where('id', $temary->id)->first();
        return view('temaries.edit')->with('temary', $found_temary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temary $temary)
    {
        $found_temary = Temary::find($temary->id);
        $found_temary->save();
        return redirect()->action('TemaryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temary $temary)
    {
        Temary::destroy($temary->id);
        return redirect()->action('TemaryController@index');
    }
}
