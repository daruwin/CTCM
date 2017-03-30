<?php

namespace App\Http\Controllers;

use App\PrimaryTopic;
use Illuminate\Http\Request;

class PrimaryTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primary_topics = PrimaryTopic::all();
        return view('primary_topics.index')->with('primary_topics', $primary_topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('primary_topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $primary_topic = new PrimaryTopic();
        $primary_topic->name = $request->name;
        $primary_topic->temary_id = $request->temary_id;
        $primary_topic->save();
        return redirect()->action('PrimaryTopicController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(PrimaryTopic $primary_topic)
    {
        $found_primary_topic = PrimaryTopic::where('id', $primary_topic->id)->first();
        return view('primary_topics.show')->with('primary_topic', $found_primary_topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(PrimaryTopic $primary_topic)
    {
        $found_primary_topic = PrimaryTopic::where('id', $primary_topic->id)->first();
        return view('primary_topics.edit')->with('primary_topic', $found_primary_topic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrimaryTopic $primary_topic)
    {
        $found_primary_topic = PrimaryTopic::find($primary_topic->id);
	$found_primary_topic->name = $request->name;
	$primary_topic->temary_id = $request->temary_id;
        $found_primary_topic->save();
        return redirect()->action('PrimaryTopic@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimaryTopic $primary_topic)
    {
        PrimaryTopic::destroy($primary_topic->id);
        return redirect()->action('PrimaryTopicController@index');
    }
}
