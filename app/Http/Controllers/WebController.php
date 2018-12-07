<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;
use App\Struktur;
use App\Ktp;
use App\Skk;
use App\Sptjm;
use App\Spp;
use App\Blog;
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

        $news = Blog::with('users','kategoris')->orderBy('updated_at','asc')->get()->chunk(4);
    	return view('index',compact('web','strukturs','ktp','skk','sptjm','spp','news'));
    }
}
