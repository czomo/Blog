<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
public function index(){
    return view('page.index');
}

public function about(){
    return view('page.about');
}
public function widoki(){
    $dane=array(
        'tytul'=>'widok',
        'cos' => ['numer 1','numer2','numer3']
    );
    return view('page.widok')->with($dane);
}
}
