<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index')->with('schedule', $schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->date = $request->date;
        $schedule->start_time = $request->start_time;
	$schedule->finish_time = $request->finish_time;
        $schedule->save();
        return redirect()->action('ScheduleController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        $found_schedule = Schedule::where('id', $schedule->id)->first();
        return view('schedules.show')->with('schedule', $found_schedule);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $found_schedule = Schedule::where('id', $schedule->id)->first();
        return view('schedule.edit')->with('schedule', $found_schedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $found_schedule = Classroom::find($schedule->id);
        $schedule->date = $request->date;
        $schedule->start_time = $request->start_time;
	$schedule->finish_time = $request->finish_time;
        $found_schedule->save();
        return redirect()->action('ScheduleController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);
        return redirect()->action('ScheduleController@index');
    }
}
}
