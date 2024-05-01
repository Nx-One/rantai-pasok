<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersediaanController extends Controller
{
    public function index()
    {
        return view('persediaan.index');
    }

    public function history()
    {
        return view('persediaan.history');
    }
}
