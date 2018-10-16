<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ktp;
use App\Skk;
use App\Spp;
use App\User;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
    	$ktp = Ktp::all();
    	$skk = Skk::all();
    	$spp = Spp::all();
    	$user = User::all();
    	$acc  = Ktp::where('status','acc')->count()+Skk::where('status','acc')->count()+Spp::where('status','acc')->count();
    	return view('admin.dashboard',compact('ktp','skk','spp','user','acc'));
    }
}
