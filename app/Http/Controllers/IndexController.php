<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
//    public function __invoke()
//    {
//        return view('index');
//    }

    public function index()
    {
        return view('main.index');
    }
}
