<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;
class WebController extends Controller
{
    public function index()
    {
    	$web = Web::firstOrFail();
    	return view('welcome1',compact('web'));
    }
}
