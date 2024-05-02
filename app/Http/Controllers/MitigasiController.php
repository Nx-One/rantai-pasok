<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitigasiController extends Controller
{
    // Hor 1
    public function hor1()
    {
        return view('mitigasi.hor1.index');
    }
    public function hor1Connection()
    {
        return view('mitigasi.hor1.connection');
    }
    public function hor1Result()
    {
        return view('mitigasi.hor1.result');
    }

    // Hor 2
    public function hor2()
    {
        return view('mitigasi.hor2.index');
    }
    public function hor2Connection()
    {
        return view('mitigasi.hor2.connection');
    }
    public function hor2Result()
    {
        return view('mitigasi.hor2.result');
    }
}
