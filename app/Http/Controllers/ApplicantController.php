<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('applicants.index');
    	
    }
    
    public function Data()
    {
    	return Datatables::of(Applicant::query())
	    ->addColumn('action', function ($applicant) {
	    	return '<a href="applicants/'.$applicant->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>	
			';
	    	//return view('applicants.actions', compact('applicant'))->render();
	    })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $applicant = new Applicant();
        $applicant->first_name = $request->first_name;
        $applicant->last_name = $request->last_name;
    	$applicant->dni = $request->dni;
    	$applicant->phone = $request->phone;
    	$applicant->email = $request->email;
        $applicant->save();
        return redirect()->action('ApplicantController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        $found_applicant = Applicant::where('id', $applicant->id)->first();
        return view('applicants.show')->with('applicant', $found_applicant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        $found_applicant = Applicant::where('id', $applicant->id)->first();
        return view('applicants.edit')->with('applicant', $found_applicant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        $found_applicant = applicant::find($applicant->id);
        $found_applicant->first_name = $request->first_name;
    	$found_applicant->last_name = $request->last_name;
        $found_applicant->dni = $request->dni;
    	$found_applicant->phone = $request->phone;
    	$found_applicant->email = $request->email;
        $found_applicant->save();
        return redirect()->action('ApplicantController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        Applicant::destroy($applicant->id);
        return redirect()->action('ApplicantController@index');
    }
}
