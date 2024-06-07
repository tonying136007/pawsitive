<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index1(){
        return view('user-info.index-1');
    }

    public function index2(){
        return view('user-info.index-2');
    }

    public function index3(){
        return view('user-info.index-3');
    }

    public function index4(){
        return view('user-info.index-4');
    }

    public function index5(){
        return view('user-info.index-5');
    }

    
}
