<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitigasiController extends Controller
{
    public function index()
    {
        return view('mitigasi.index');
    }

    public function hor2()
    {
        return view('mitigasi.hor2');
    }
}
