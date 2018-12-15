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
use App\Kategori;
use App\Pekerjaan;
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
        $ps = Pekerjaan::all();

        $news = Blog::with('users','kategoris')->orderBy('updated_at','desc')->get()->chunk(4);
    	return view('index',compact('web','strukturs','ktp','skk','sptjm','spp','news','ps'));
    }

    public function blogIndex(Request $req)
    {
        $web = Web::firstOrFail();
        $posts = Blog::with('users','kategoris')->orderBy('updated_at','desc')->paginate(3);
        $kategoris = Kategori::all();
        return view('blog',compact('web','posts','kategoris'))->with('no',($req->input('page',1)-1)*10);
    }

    public function blogDetail($slug)
    {
        $web = Web::firstOrFail();
        $post = Blog::where('slug',$slug)->with('users','kategoris')->firstOrFail();
        $kategoris = Kategori::all();
        return view('blogDetail',compact('web','post','kategoris')); 
    }

    public function kategori(Request $req,$slug)
    {   
        $k = Kategori::where('slug',$slug)->firstOrFail();
        $web = Web::firstOrFail();
        $posts = Blog::where('kategori_id',$k->id)->with('users','kategoris')->orderBy('updated_at','desc')->paginate(3);
        $kategoris = Kategori::all();
        return view('blog',compact('web','posts','kategoris'))->with('no',($req->input('page',1)-1)*10);
    }

    public function cari(Request $req)
    {
        $q = $req->input('cari');
        $web = Web::firstOrFail();
        $posts = Blog::WhereHas('kategoris',function($c) use($q){
                    $c->where('nama','LIKE', '%'.$q.'%');
                 })
                 ->orWhere('judul','LIKE', '%'.$q.'%')
                 ->orWhere('slug','LIKE', '%'.$q.'%')
                 ->with('users','kategoris')
                 ->orderBy('updated_at','desc')
                 ->paginate(3);
        $kategoris = Kategori::all();
        return view('blog',compact('web','posts','kategoris'))->with('no',($req->input('page',1)-1)*10);
    }
}
