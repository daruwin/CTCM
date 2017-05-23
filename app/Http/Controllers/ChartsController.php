<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ChartsController extends Controller
{
    /* Charts that will be protected to normal users */
    public $protected_charts = ['admin_dashboard'];

    /**
     * Show the chart, made to be displayed in an iframe.
     *
     * @param int $name
     * @param int $height
     */
    public function index()
    {
        return view('charts');
    }

    public function show($name, $height)
    {
        return view("charts.$name", ['height' => $height]);
    }

    /**
     * Protected charts will go here first.
     * You can change this condition how you like.
     */
    public function checkProtected()
    {
        if(!Auth::user()->admin) {
            abort(404);
        }
    }
}