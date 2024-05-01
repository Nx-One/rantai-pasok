<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RantaiController extends Controller
{
    public function index()
    {
        return view('rantai.index');
    }

    public function form()
    {
        return view('rantai.form');
    }
}
