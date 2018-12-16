<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;
use App\Struktur;

use App\Ktp;
use App\Skk;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;
use App\User;

use App\Blog;
use App\Kategori;
use App\Pekerjaan;
use App\Pengunjung;

use Browser;
class WebController extends Controller
{
    public function index()
    {
    	$web = Web::firstOrFail();
    	$strukturs = Struktur::all();
        $ps = Pekerjaan::all();

        $acc  =   Ktp::where('status','=','acc')->count()+Skk::where('status','=','acc')->count()
                    +Pengaduan::where('status','=','acc')->count()+Sk::where('status','=','acc')->count()
                    +Skematian::where('status','=','acc')->count()+Sktm::where('status','=','acc')->count()
                    +Sptjm::where('status','=','acc')->count();

        $pending  =  Ktp::where('status','=','pending')->count()+Skk::where('status','=','pending')->count()
                    +Pengaduan::where('status','=','pending')->count()+Sk::where('status','=','pending')->count()
                    +Skematian::where('status','=','pending')->count()+Sktm::where('status','=','pending')->count()
                    +Sptjm::where('status','=','pending')->count();

        $p_total   = Pengunjung::count();
        $p_thisMonth = Pengunjung::whereRaw('MONTH(created_at) ='.date('m'))->count();

        if (Browser::isMobile()) {
            $platform ='Mobile';
        }elseif (Browser::isTablet()) {
            $platform ='Tablet';
        }elseif (Browser::isDesktop()) {
            $platform ='Desktop';
        }

        Pengunjung::create([
            'users' => Browser::userAgent(),
            'browsers' => Browser::browserName(),
            'oses' => Browser::platformFamily(),
            'platform' => $platform,
        ]); 

        $news = Blog::with('users','kategoris')->orderBy('updated_at','desc')->get()->chunk(4);
    	return view('index',compact('web','strukturs','acc','pending','p_total','p_thisMonth','news','ps'));
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
