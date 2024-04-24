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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // TEMP CODE. TODO: Move this to a new controller
    public function persediaan()
    {
        return view('persediaan.index');
    }

    public function mitigasi()
    {
        return view('mitigasi.index');
    }

    public function rantai()
    {
        return view('rantai.index');
    }

    public function mutu()
    {
        return view('mutu.index');
    }
}
