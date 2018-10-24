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

        if ($request->user()->hasRole('Admin')) {
            return redirect('/admin');
        }

        if ($request->user()->hasRole('User')) {
            return redirect('/');
        }

        // $request->user()->authorizeRoles(['Super Admin','Admin','User']);
        // return view('home');
    }
}
