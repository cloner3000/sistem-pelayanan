<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;
use App\Struktur;
use App\Ktp;
use App\Skk;
use App\Sptjm;
use App\Spp;
class WebController extends Controller
{
    public function index()
    {
    	$web = Web::firstOrFail();
    	$strukturs = Struktur::all();
    	$ktp = Ktp::count();
    	$skk = Skk::count();
    	$sptjm = Sptjm::count();
    	$spp = Spp::count();
    	return view('index',compact('web','strukturs','ktp','skk','sptjm','spp'));
    }
}
