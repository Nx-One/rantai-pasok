<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MutuController extends Controller
{
    public function index()
    {
        return view('mutu.index');
    }
}
