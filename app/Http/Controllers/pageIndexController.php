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

    public function formerPrincipals()
    {
        return view('frontend.pages.former-principals');
    }

    public function exEmployees()
    {
        return view('frontend.pages.ex-employees');
    }

    public function notices()
    {
        return view('frontend.pages.notice.notice-list');
    }

    public function noticeDetails($name)
    {
        return view('frontend.pages.notice.single', compact('name'));
    }

    public function stipends()
    {
        return view('frontend.pages.stipend.stipend-list');
    }

    public function stipendDetails($name)
    {
        return view('frontend.pages.stipend.single', compact('name'));
    }

    public function admissionList()
    {
        return view('frontend.pages.admission.admission-list');
    }

    public function admissionDetails($name)
    {
        return view('frontend.pages.admission.single', compact('name'));
    }

    public function jobs()
    {
        return view('frontend.pages.job.job-list');
    }

    public function jobDetails($name)
    {
        return view('frontend.pages.job.single', compact('name'));
    }
}
