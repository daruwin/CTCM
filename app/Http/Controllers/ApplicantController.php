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
    public function index(Request $request)
    {
        $search_entry = $request -> search_entry;

        if ($search_entry != NULL OR $search_entry != '')
        {
            $search_values = preg_split('/\s+/', $search_entry, -1, PREG_SPLIT_NO_EMPTY);
            $applicants = Applicant::where(function($query) use($search_values) {
                foreach ($search_values as $value) {
                    $query -> orWhere('first_name', 'like', "%{$value}%")
                        ->orWhere('first_surname', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('document', 'like', "%{$value}%");
                }
            })-> paginate(8)->unique('document') ;
            $search_placeholder = 'Results for '.$search_entry;

            return view('applicants.index') -> with('applicants', $applicants) -> with('search_placeholder', $search_placeholder);

        } else
        {
            $applicants = Applicant::paginate(8)->unique('document');

            return view('applicants.index') -> with('applicants', $applicants);
        }
    }
/*
    public function Data()
    {
        //$applicants = Applicant::select()->groupBy('first_name')->get()->toArray() ;
        //$applicants = DB::table('applicants')->distinct()->get();
        return Datatables::of(Applicant::query())//->groupBy('document')->get())
            ->addColumn('action', function ($applicant) {
                return '<a href="applicants/'.$applicant->id.'/edit" class="btn btn-xs btn-danger">
                <i class="glyphicon glyphicon-edit"></i>Edit</a>
            <a href="applicants/'.$applicant->document.'/show" class="btn btn-xs btn-warning">
            <i class="glyphicon glyphicon-edit"></i>Show</a>';
	    })->make(true);
    }
*/
    public function show(Request $request,$document)
    {
        $search_entry = $request -> search_entry;
        if ($search_entry != NULL OR $search_entry != '')
        {
            $search_values = preg_split('/\s+/', $search_entry, -1, PREG_SPLIT_NO_EMPTY);
            $applicants = Applicant::where([
                ['document', '=', $document],
                function($query) use($search_values) {
                foreach ($search_values as $value) {
                    $query -> orWhere('workshop_name', 'like', "%{$value}%");
                }
            }]) -> paginate(8);
            $search_placeholder = 'Results for '.$search_entry;

            return view('applicants.show') -> with('applicants', $applicants) -> with('search_placeholder', $search_placeholder);

        } else
        {
            $applicants = Applicant::where('document', $document)->paginate(8);
            return view('applicants.show') -> with('applicants', $applicants);
        }
    }
    /*
    public function show($document)
    {
        $applicants = Applicant::where('document', $document)->get();
        return view('applicants.show',compact('applicants'));
    }
    */
    /*
    public function Datashow(Applicant $found_applicant)
    {
        return Datatables::of($found_applicant)
            ->addColumn('action', function ($applicant) {
	    	return '<a href="'.$applicant->id.'/edit" class="btn btn-xs btn-danger">
            <i class="glyphicon glyphicon-edit"></i>Edit</a>';})
            ->make(true);
    }*/

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
        $applicant->middle_name = $request->middle_name;
        $applicant->first_surname = $request->first_surname;
        $applicant->second_surname = $request->second_surname;
        $applicant->birth_date = $request->birth_date;
        $applicant->document = $request->document;
        $applicant->home_phone = $request->home_phone;
        $applicant->mobile_phone = $request->mobile_phone;
        $applicant->email = $request->email;
        $applicant->workshop_name = $request->workshop_name;
        $applicant->status ='pending';
        $applicant->save();
        return redirect()->action('ApplicantController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
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
        $found_applicant->middle_name = $request->middle_name;
        $found_applicant->first_surname = $request->first_surname;
        $found_applicant->second_surname = $request->second_surname;
        $found_applicant->birth_date = $request->birth_date;
        $found_applicant->document = $request->document;
        $found_applicant->home_phone = $request->home_phone;
        $found_applicant->mobile_phone = $request->mobile_phone;
        $found_applicant->email = $request->email;
        $found_applicant->save();
        return redirect()->action('ApplicantController@index');
    }

    public function postApprove($id) {
        $applicant = Applicant::where('id', $id)->first();
        if($applicant)
        {
            $applicant->status ='approved';
            $applicant->save();
            return redirect()->back();
        }
    }

    public function postReject($id) {
        $applicant = Applicant::where('id', $id)->first();
        if($applicant)
        {
            $applicant->status ='rejected';
            $applicant->save();
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $document=$applicant->document;
        Applicant::destroy($applicant->id);
        $applications=Applicant::where('document', $document)->first();
        if($applications){
            return redirect()->back();
            //return view('applicants.show') -> with('applicants', $applications);
        }
        else{
            return redirect()->action('ApplicantController@index');
        }
    }
}
