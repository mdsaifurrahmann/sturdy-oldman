<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class pageIndexController extends Controller
{
    public function home()
    {
        $data = DB::table('data')->get();
        $principal = DB::table('principal')->where('id', 1)->get()->first();
        $notices = DB::table('notices')
            ->select('id', 'title')
            ->latest('created_at')
            ->take(5)
            ->get();

        $sliders = json_decode($data[0]->data);
        $history = json_decode($data[1]->data);
        $machinery = json_decode($data->where('target', 'machinery')->value('data'));

        return view('frontend.home', compact('sliders', 'history', 'machinery', 'principal', 'notices'));
    }

    public function infrastructure()
    {
        return view('frontend.pages.infrastructure');
    }

    public function history()
    {
        $history = json_decode(\DB::table('data')->where('target', 'history')->value('data'));
        return view('frontend.pages.history', compact('history'));
    }

    public function principal()
    {
        $id = 1;
        $principal = DB::table('principal')->where('id', $id)->get()->first();
        return view('frontend.pages.principal', compact('principal'));
    }

    public function formerPrincipals()
    {
        $principals = DB::table('former_principals')->get();
        return view('frontend.pages.former-principals', compact('principals'));
    }

    public function exEmployees()
    {
        $employees = DB::table('former_employees')->get();
        return view('frontend.pages.ex-employees', compact('employees'));
    }

    public function notices()
    {
        $notice = DB::table('notices')
            ->select('id', 'title', 'date', 'time')
            ->latest('created_at')
            ->latest('created_at')
            ->paginate(10);
        return view('frontend.pages.notice.notice-list', compact('notice'));
    }

    public function noticeDetails($id, $name)
    {
        $notice = DB::table('notices')->where('id', $id)->get()->first();
        $attachments = json_decode($notice->file);
        return view('frontend.pages.notice.single', compact('name', 'notice', 'attachments'));
    }

    public function noticeDownload($name)
    {
        $path = public_path('notices/' . $name);
        return response()->download($path);
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

    public function gallery()
    {
        return view('frontend.pages.gallery.album');
    }

    public function gallerySingle($name)
    {
        return view('frontend.pages.gallery.single', compact('name'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    //    Backend Being
    public function govern()
    {
        return view('area52.govern');
    }

    public function slider()
    {
        if (!Auth::check()) {
            redirect()->route('login');
        }

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        return view('area52.home.slider.add-slider');
    }

    public function updatehistory()
    {

        $history = json_decode(\DB::table('data')->where('target', 'history')->value('data'));

        return view('area52.history', compact('history'));
    }

    public function machine()
    {
        $machinery = json_decode(DB::table('data')->where('target', 'machinery')->value('data'));
        $list = $machinery->items;
        return view('area52.home.machine.machine', compact('machinery', 'list'));
    }

    public function updatePrincipal()
    {
        $id = 1;
        $principal = DB::table('principal')->where('id', $id)->get()->first();
        return view('area52.principal.principal', compact('principal'));
    }
}
