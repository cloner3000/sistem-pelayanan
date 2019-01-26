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
        $kats = Kategori::where('slug','LIKE','%pengurus-bpd%')
                        ->orWhere('slug','LIKE','%pengurus-lpm%')
                        ->orWhere('slug','LIKE','%pengurus-pkk%')
                        ->orWhere('slug','LIKE','%karang-taruna%')
                        ->orWhere('slug','LIKE','%rw-rt%')
                        ->orWhere('slug','LIKE','%kader-posyandu%')
                        ->orWhere('slug','LIKE','%linmas%')
                        ->orWhere('slug','LIKE','%mui-desa%')
                        ->orWhere('slug','LIKE','%gapoktan%')
                        ->orWhere('slug','LIKE','%peraturan-desa%')
                        ->orWhere('slug','LIKE','%kekayaan-desa%')
                        ->orWhere('slug','LIKE','%keuangan-desa%')
                        ->get();

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
    	return view('index',compact('web','strukturs','acc','pending','p_total','p_thisMonth','news','ps','kats'));
    }

    public function blogIndex(Request $req)
    {        
        $kats = Kategori::where('slug','LIKE','%pengurus-bpd%')
                        ->orWhere('slug','LIKE','%pengurus-lpm%')
                        ->orWhere('slug','LIKE','%pengurus-pkk%')
                        ->orWhere('slug','LIKE','%karang-taruna%')
                        ->orWhere('slug','LIKE','%rw-rt%')
                        ->orWhere('slug','LIKE','%kader-posyandu%')
                        ->orWhere('slug','LIKE','%linmas%')
                        ->orWhere('slug','LIKE','%mui-desa%')
                        ->orWhere('slug','LIKE','%gapoktan%')
                        ->orWhere('slug','LIKE','%peraturan-desa%')
                        ->orWhere('slug','LIKE','%kekayaan-desa%')
                        ->orWhere('slug','LIKE','%keuangan-desa%')
                        ->get();
        $web = Web::firstOrFail();
        $posts = Blog::with('users','kategoris')->orderBy('updated_at','desc')->paginate(3);
        $kategoris = Kategori::where('slug','!=','peraturan-desa')
                        ->where('slug','!=','keuangan-desa')
                        ->where('slug','!=','kekayaan-desa')
                        ->where('slug','!=','pengurus-bpd')
                        ->where('slug','!=','pengurus-lpm')
                        ->where('slug','!=','pengurus-pkk')
                        ->where('slug','!=','karang-taruna')
                        ->where('slug','!=','rw-rt')
                        ->where('slug','!=','kader-posyandu')
                        ->where('slug','!=','linmas')
                        ->where('slug','!=','mui-desa')
                        ->where('slug','!=','gapoktan')
                        ->get();
        return view('blog',compact('web','posts','kategoris','kats'))->with('no',($req->input('page',1)-1)*10);
    }

    public function blogDetail($slug)
    {        $kats = Kategori::where('slug','LIKE','%pengurus-bpd%')
                        ->orWhere('slug','LIKE','%pengurus-lpm%')
                        ->orWhere('slug','LIKE','%pengurus-pkk%')
                        ->orWhere('slug','LIKE','%karang-taruna%')
                        ->orWhere('slug','LIKE','%rw-rt%')
                        ->orWhere('slug','LIKE','%kader-posyandu%')
                        ->orWhere('slug','LIKE','%linmas%')
                        ->orWhere('slug','LIKE','%mui-desa%')
                        ->orWhere('slug','LIKE','%gapoktan%')
                        ->orWhere('slug','LIKE','%peraturan-desa%')
                        ->orWhere('slug','LIKE','%kekayaan-desa%')
                        ->orWhere('slug','LIKE','%keuangan-desa%')
                        ->get();
        $web = Web::firstOrFail();
        $post = Blog::where('slug',$slug)->with('users','kategoris')->firstOrFail();
        $kategoris = Kategori::where('slug','!=','peraturan-desa')
                        ->where('slug','!=','keuangan-desa')
                        ->where('slug','!=','kekayaan-desa')
                        ->where('slug','!=','pengurus-bpd')
                        ->where('slug','!=','pengurus-lpm')
                        ->where('slug','!=','pengurus-pkk')
                        ->where('slug','!=','karang-taruna')
                        ->where('slug','!=','rw-rt')
                        ->where('slug','!=','kader-posyandu')
                        ->where('slug','!=','linmas')
                        ->where('slug','!=','mui-desa')
                        ->where('slug','!=','gapoktan')
                        ->get();
        return view('blogDetail',compact('web','post','kategoris','kats')); 
    }

    public function kategori(Request $req,$slug)
    {        $kats = Kategori::where('slug','LIKE','%pengurus-bpd%')
                        ->orWhere('slug','LIKE','%pengurus-lpm%')
                        ->orWhere('slug','LIKE','%pengurus-pkk%')
                        ->orWhere('slug','LIKE','%karang-taruna%')
                        ->orWhere('slug','LIKE','%rw-rt%')
                        ->orWhere('slug','LIKE','%kader-posyandu%')
                        ->orWhere('slug','LIKE','%linmas%')
                        ->orWhere('slug','LIKE','%mui-desa%')
                        ->orWhere('slug','LIKE','%gapoktan%')
                        ->orWhere('slug','LIKE','%peraturan-desa%')
                        ->orWhere('slug','LIKE','%kekayaan-desa%')
                        ->orWhere('slug','LIKE','%keuangan-desa%')
                        ->get();   
        $k = Kategori::where('slug',$slug)->firstOrFail();
        $web = Web::firstOrFail();
        $posts = Blog::where('kategori_id',$k->id)->with('users','kategoris')->orderBy('updated_at','desc')->paginate(3);
        $kategoris = Kategori::where('slug','!=','peraturan-desa')
                        ->where('slug','!=','keuangan-desa')
                        ->where('slug','!=','kekayaan-desa')
                        ->where('slug','!=','pengurus-bpd')
                        ->where('slug','!=','pengurus-lpm')
                        ->where('slug','!=','pengurus-pkk')
                        ->where('slug','!=','karang-taruna')
                        ->where('slug','!=','rw-rt')
                        ->where('slug','!=','kader-posyandu')
                        ->where('slug','!=','linmas')
                        ->where('slug','!=','mui-desa')
                        ->where('slug','!=','gapoktan')
                        ->get();
        return view('blog',compact('web','posts','kategoris','kats'))->with('no',($req->input('page',1)-1)*10);
    }

    public function cari(Request $req)
    {        $kats = Kategori::where('slug','LIKE','%pengurus-bpd%')
                        ->orWhere('slug','LIKE','%pengurus-lpm%')
                        ->orWhere('slug','LIKE','%pengurus-pkk%')
                        ->orWhere('slug','LIKE','%karang-taruna%')
                        ->orWhere('slug','LIKE','%rw-rt%')
                        ->orWhere('slug','LIKE','%kader-posyandu%')
                        ->orWhere('slug','LIKE','%linmas%')
                        ->orWhere('slug','LIKE','%mui-desa%')
                        ->orWhere('slug','LIKE','%gapoktan%')
                        ->orWhere('slug','LIKE','%peraturan-desa%')
                        ->orWhere('slug','LIKE','%kekayaan-desa%')
                        ->orWhere('slug','LIKE','%keuangan-desa%')
                        ->get();
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
        $kategoris = Kategori::where('slug','!=','peraturan-desa')
                        ->where('slug','!=','keuangan-desa')
                        ->where('slug','!=','kekayaan-desa')
                        ->where('slug','!=','pengurus-bpd')
                        ->where('slug','!=','pengurus-lpm')
                        ->where('slug','!=','pengurus-pkk')
                        ->where('slug','!=','karang-taruna')
                        ->where('slug','!=','rw-rt')
                        ->where('slug','!=','kader-posyandu')
                        ->where('slug','!=','linmas')
                        ->where('slug','!=','mui-desa')
                        ->where('slug','!=','gapoktan')
                        ->get();
        return view('blog',compact('web','posts','kategoris','kats'))->with('no',($req->input('page',1)-1)*10);
    }

    public function visi_misi(){        $kats = Kategori::where('slug','LIKE','%pengurus-bpd%')
                        ->orWhere('slug','LIKE','%pengurus-lpm%')
                        ->orWhere('slug','LIKE','%pengurus-pkk%')
                        ->orWhere('slug','LIKE','%karang-taruna%')
                        ->orWhere('slug','LIKE','%rw-rt%')
                        ->orWhere('slug','LIKE','%kader-posyandu%')
                        ->orWhere('slug','LIKE','%linmas%')
                        ->orWhere('slug','LIKE','%mui-desa%')
                        ->orWhere('slug','LIKE','%gapoktan%')
                        ->orWhere('slug','LIKE','%peraturan-desa%')
                        ->orWhere('slug','LIKE','%kekayaan-desa%')
                        ->orWhere('slug','LIKE','%keuangan-desa%')
                        ->get();
        $web = Web::firstOrFail();
        $kategoris = Kategori::where('slug','!=','peraturan-desa')
                        ->where('slug','!=','keuangan-desa')
                        ->where('slug','!=','kekayaan-desa')
                        ->where('slug','!=','pengurus-bpd')
                        ->where('slug','!=','pengurus-lpm')
                        ->where('slug','!=','pengurus-pkk')
                        ->where('slug','!=','karang-taruna')
                        ->where('slug','!=','rw-rt')
                        ->where('slug','!=','kader-posyandu')
                        ->where('slug','!=','linmas')
                        ->where('slug','!=','mui-desa')
                        ->where('slug','!=','gapoktan')
                        ->get();
        return view('visi_misi',compact('web','post','kategoris','kats')); 
    }

    public function sejarah(){        $kats = Kategori::where('slug','LIKE','%pengurus-bpd%')
                        ->orWhere('slug','LIKE','%pengurus-lpm%')
                        ->orWhere('slug','LIKE','%pengurus-pkk%')
                        ->orWhere('slug','LIKE','%karang-taruna%')
                        ->orWhere('slug','LIKE','%rw-rt%')
                        ->orWhere('slug','LIKE','%kader-posyandu%')
                        ->orWhere('slug','LIKE','%linmas%')
                        ->orWhere('slug','LIKE','%mui-desa%')
                        ->orWhere('slug','LIKE','%gapoktan%')
                        ->orWhere('slug','LIKE','%peraturan-desa%')
                        ->orWhere('slug','LIKE','%kekayaan-desa%')
                        ->orWhere('slug','LIKE','%keuangan-desa%')
                        ->get();
        $web = Web::firstOrFail();
        $kategoris = Kategori::where('slug','!=','peraturan-desa')
                        ->where('slug','!=','keuangan-desa')
                        ->where('slug','!=','kekayaan-desa')
                        ->where('slug','!=','pengurus-bpd')
                        ->where('slug','!=','pengurus-lpm')
                        ->where('slug','!=','pengurus-pkk')
                        ->where('slug','!=','karang-taruna')
                        ->where('slug','!=','rw-rt')
                        ->where('slug','!=','kader-posyandu')
                        ->where('slug','!=','linmas')
                        ->where('slug','!=','mui-desa')
                        ->where('slug','!=','gapoktan')
                        ->get();
        return view('sejarah',compact('web','post','kategoris','kats')); 
    }
}
