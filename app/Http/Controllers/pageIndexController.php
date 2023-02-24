<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Router;

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
        $stipends = DB::table('notices')
            ->join('notice_categories', 'notices.category_id', '=', 'notice_categories.id')
            ->where('notice_categories.name', 'stipend')
            ->select('notices.*')
            ->latest('created_at')
            ->paginate(10);
        return view('frontend.pages.stipend.stipend-list', compact('stipends'));
    }


    public function admissionList()
    {
        $admission = DB::table('notices')
            ->join('notice_categories', 'notices.category_id', '=', 'notice_categories.id')
            ->where('notice_categories.name', 'admission')
            ->select('notices.*')
            ->latest('created_at')
            ->paginate(10);

        return view('frontend.pages.admission.admission-list', compact('admission'));
    }


    public function jobs()
    {
        $jobs = DB::table('notices')
            ->join('notice_categories', 'notices.category_id', '=', 'notice_categories.id')
            ->where('notice_categories.name', 'job corner')
            ->select('notices.*')
            ->latest('created_at')
            ->paginate(10);
        return view('frontend.pages.job.job-list', compact('jobs'));
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


    public function apa()
    {
        $currentRoute = app('router')->current();

        if ($currentRoute->getName() == 'apa-gct') {
            $id = '1';

        }
        if ($currentRoute->getName() == 'apc') {
            $id = '2';
        }
        if ($currentRoute->getName() == 'mer') {
            $id = '3';
        }
        if ($currentRoute->getName() == 'mssl') {
            $id = '4';
        }
        if ($currentRoute->getName() == 'sccc') {
            $id = '5';
        }
        if ($currentRoute->getName() == 'fpo') {
            $id = '6';
        }
        if ($currentRoute->getName() == 'qamer') {
            $id = '7';
        }
        if ($currentRoute->getName() == 'laws') {
            $id = '8';
        }
        if ($currentRoute->getName() == 'nps') {
            $id = '9';
        }
        if ($currentRoute->getName() == 'committees') {
            $id = '10';
        }
        if ($currentRoute->getName() == 'schedule') {
            $id = '11';
        }
        if ($currentRoute->getName() == 'reports') {
            $id = '12';
        }
        if ($currentRoute->getName() == 'compendiums') {
            $id = '13';
        }
        if ($currentRoute->getName() == 'innovation-team') {
            $id = '14';
        }
        if ($currentRoute->getName() == 'aiap') {
            $id = '15';
        }
        if ($currentRoute->getName() == 'innovative-projects') {
            $id = '16';
        }
        if ($currentRoute->getName() == 'roaa') {
            $id = '17';
        }
        if ($currentRoute->getName() == 'appeal-form') {
            $id = '18';
        }
        if ($currentRoute->getName() == 'vdi') {
            $id = '19';
        }
        if ($currentRoute->getName() == 'guidelines') {
            $id = '20';
        }
        if ($currentRoute->getName() == 'appellate-officers') {
            $id = '21';
        }
        if ($currentRoute->getName() == 'cer') {
            $id = '22';
        }
        if ($currentRoute->getName() == 'complaint-filing') {
            $id = '23';
        }
        if ($currentRoute->getName() == 'complaint-laws') {
            $id = '24';
        }


        $data = DB::table('apa')
            ->join('apa_items', 'apa.category_id', '=', 'apa_items.id')
            ->where('apa_items.id', $id)
            ->select('apa.*', 'apa_items.name as name')
            ->latest('created_at')
            ->paginate(10);

        $name = DB::table('apa_items')->where('id', $id)->value('name');

        return view('frontend.pages.apa.apa-list', compact('data', 'name'));

    }

    public function apaDownload($name)
    {
        $path = public_path('apa/' . $name);
        return response()->download($path);
    }

    public function apaSingle($id, $name)
    {
        $apa = DB::table('apa')->where('id', $id)->get()->first();
        $attachments = json_decode($apa->file);
        return view('frontend.pages.apa.single', compact('name', 'apa', 'attachments'));
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
