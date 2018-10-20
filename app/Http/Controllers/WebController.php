<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;
use App\Struktur;
class WebController extends Controller
{
    public function index()
    {
    	$web = Web::firstOrFail();
    	$strukturs = Struktur::all();
    	return view('welcome1',compact('web','strukturs'));
    }
}
