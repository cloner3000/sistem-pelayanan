<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('Kepala Desa')) {
            return redirect('/kades');
        }

        if ($request->user()->hasRole('Sekretaris Desa')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Urusan Administrasi Umum')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Urusan Keuangan')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Urusan Perencanaan')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Seksi Pelayanan')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Seksi Pemerintahan')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Seksi Kesejahteraan')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Dusun Malinggut 1')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Dusun Malinggut 2')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Dusun Malinggut 3')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('Kepala Dusun Sukamaju')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('User')) {
            return redirect('/');
        }

        // $request->user()->authorizeRoles(['Super Admin','Admin','User']);
        // return view('home');
    }
}
