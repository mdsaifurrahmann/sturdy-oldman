<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageIndexController extends Controller
{
    public function infrastructure(){
        return view('frontend.pages.infrastructure');
    }
}
