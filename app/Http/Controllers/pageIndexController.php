<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageIndexController extends Controller
{
    public function infrastructure()
    {
        return view('frontend.pages.infrastructure');
    }

    public function history()
    {
        return view('frontend.pages.history');
    }

    public function principal()
    {
        return view('frontend.pages.principal');
    }
}
