<?php

namespace App\Http\Controllers;

use App\SecondaryTopic;
use Illuminate\Http\Request;

class SecondaryTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secondary_topics = SecondaryTopic::all();
        return view('secondary_topics.index')->with('secondary_topics', $secondary_topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secondary_topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secondary_topic = new SecondaryTopic();
        $secondary_topic->name = $request->name;	
        $secondary_topic->primary_topic_id = $request->primary_topic_id;
        $secondary_topic->save();
        return redirect()->action('SecondaryTopicController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(SecondaryTopic $secondary_topic)
    {
        $found_secondary_topic = SecondaryTopic::where('id', $secondary_topic->id)->first();
        return view('secondary_topics.show')->with('secondary_topic', $found_secondary_topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondaryTopic $secondary_topic)
    {
        $found_secondary_topic = SecondaryTopic::where('id', $secondary_topic->id)->first();
        return view('secondary_topics.edit')->with('secondary_topic', $found_secondary_topic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondaryTopic $secondary_topic)
    {
        $found_secondary_topic = SecondaryTopic::find($secondary_topic->id);
	$found_secondary_topic->name = $request->name;
        $found_secondary_topic->save();
        return redirect()->action('SecondaryTopic@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondaryTopic $secondary_topic)
    {
        SecondaryTopic::destroy($secondary_topic->id);
        return redirect()->action('SecondaryTopicController@index');
    }
}
