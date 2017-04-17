<?php

namespace App\Http\Controllers;
use App\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workshop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function Data()
    {
    	return Datatables::of(Workshop::query())
    	->addColumn('action', function ($workshop) {
    		return '<a href="classrooms/'.$workshop->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="classrooms.delete/'.$$workshop->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
            ';
    	})->make(true);
    }
    
    public function create()
    {
        return view('workshops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workshop = new Workshop();
	$workshop->name = $request->name;
	$workshop->proposal_id = $request->proposal_id;
        $workshop->save();
        return redirect()->action('WorkshopController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop $workshop)
    {
        $found_workshop = Workshop::where('id', $workshop->id)->first();
        return view('workshops.show')->with('workshop', $found_workshop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $found_workshop = Workshop::where('id', $workshop->id)->first();
        return view('workshops.edit')->with('workshop', $found_workshop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $found_workshop = Workshop::find($workshop->id);
        $found_workshop->name = $request->name;
        $found_workshop->save();
        return redirect()->action('WorkshopController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop $workshop)
    {
        Workshop::destryo($workshop->$id);
	return redirect()->action('WorkshopController@index');
    }
}
