<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MutuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('mutu.index');
    }

    public function rasa()
    {
        return view('mutu.rasa');
    }

    public function warna()
    {
        return view('mutu.warna');
    }

    public function aroma()
    {
        return view('mutu.aroma');
    }

    public function asam()
    {
        return view('mutu.asam');
    }

    public function tpt()
    {
        return view('mutu.tpt');
    }
}
