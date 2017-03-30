<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::all();
        return view('proposals.index')->with('proposals', $proposals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proposal = new Proposal();
        $proposal->name = $request->name;
        $proposal->temary_id = $request->temary_id;
        $proposal->teacher_id = $request->teacher_id;
        $proposal->classroom_id = $request->classroom_id;
        $classroom->save();
        return redirect()->action('TemaryController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        $found_proposal = Proposal::where('id', $proposal->id)->first();
        return view('proposals.show')->with('proposal', $found_proposal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
	$found_proposal = Proposal::where('id', $proposal->id)->first();
        return view('proposals.edit')->with('proposal', $found_proposal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        $found_proposal = Proposal::find($proposal->id);
        $found_proposal->name = $request->name;
        $found_proposal->temary_id = $request->temary_id;
        $found_proposal->teacher_id = $request->teacher_id;
        $found_proposal->classroom_id = $request->classroom_id;
        $found_proposal->save();
        return redirect()->action('ProposalController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        Proposal::destroy($proposal->id);
        return redirect()->action('ProposalController@index');
    }
}
