<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Worker;

class WorkerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$worker = Worker::all();
		return view('workers.index')->with('workers', $workers);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('workers.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$worker = new Worker();
		$worker->firs_name = $request->firs_name;
		$worker->last_name = $request->last_name;
		$worker->address = $request->address;
		$worker->phone = $request->phone;
		$worker->email = $request->email;
		$worker->save();
		return redirect()->action('WorkerController@index');
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Classroom  $classroom
	 * @return \Illuminate\Http\Response
	 */
	public function show(Worker $worker)
	{
		$found_worker = Worker::where('id', $worker->id)->first();
		return view('workers.show')->with('worker', $found_worker);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Classroom  $classroom
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Worker $worker)
	{
		$found_worker = Worker::where('id', $worker->id)->first();
		return view('workers.edit')->with('worker', $found_worker);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Classroom  $classroom
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Worker $worker)
	{
		$found_worker = Worker::find($request->id);
		$found_worker->first_name = $request->first_name;
		$found_worker->last_name = $request->last_name;
		$found_worker->address = $request->address;
		$found_worker->phone = $request->phone;
		$found_worker->email = $request->email;
		$found_worker->save();
		return redirect()->action('WorkerController@index');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Classroom  $classroom
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Worker $worker)
	{
		Worker::destroy($worker->id);
		return redirect()->action('WorkerController@index');
	}
}
