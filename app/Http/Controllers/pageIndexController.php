<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class pageIndexController extends Controller
{

    public function home()
    {
        App::getLocale('bn');
        $id = 1;
        $data = DB::table('data')->get();
        $principal = DB::table('principal')
            ->where('principal.id', $id)
            ->join('designations', 'principal.position', '=', 'designations.id')
            ->select('principal.*', 'designations.designation as position')
            ->get()
            ->first();

        $notices = DB::table('notices')
            ->select('id', 'title')
            ->latest('created_at')
            ->take(5)
            ->get();

        $apaGrids = json_decode(DB::table('apa_categories')
            ->join('apa_types', 'apa_categories.type_id', '=', 'apa_types.id')
            ->select('apa_categories.*')
            ->get());


        $apaTypes = json_decode(DB::table('apa_types')->select('id', 'name', 'image')->get());

        // dd(json_decode($apaGrids));

        $sliders = json_decode($data[0]->data);
        $history = json_decode($data[1]->data);
        $machinery = json_decode($data->where('target', 'machinery')->value('data'));

        return view('frontend.home', compact('sliders', 'history', 'machinery', 'principal', 'notices', 'apaTypes', 'apaGrids'));
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
        $principal = DB::table('principal')
            ->where('principal.id', $id)
            ->join('designations', 'principal.position', '=', 'designations.id')
            ->select('principal.*', 'designations.designation as position')
            ->get()
            ->first();
        return view('frontend.pages.principal', compact('principal'));
    }

    public function formerPrincipals()
    {
        $principals = DB::table('former_principals')
            ->join('designations', 'former_principals.designation', '=', 'designations.id')
            ->select('former_principals.*', 'designations.designation as designation')
            ->get();
        return view('frontend.pages.former-principals', compact('principals'));
    }

    public function exEmployees()
    {
        $employees = DB::table('former_employees')->get();
        return view('frontend.pages.ex-employees', compact('employees'));
    }

    public function faculty(faculty $faculty)
    {
        $retrieve = $faculty->get();
        // dd($retrieve);
        return view('frontend.pages.faculty', compact('retrieve'));
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
        $notice = DB::table('notices')
            ->where('notices.id', $id)
            ->join('notice_categories', 'notices.category_id', '=', 'notice_categories.id')
            ->select('notices.*', 'notice_categories.name as category_name')
            ->get()
            ->first();
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
        $albums = DB::table('albums')->get();

        return view('frontend.pages.gallery.album', compact('albums'));
    }

    public function gallerySingle($id, $name)
    {

        if (DB::table('gallery')->count() === 0) {
            $retrieve = DB::table('albums')->where('id', $id)->get()->first();
            $images = [];
        }

        $retrieve = DB::table('gallery')
            ->join('albums', 'albums.id', '=', 'gallery.album_id')
            ->select('gallery.images', 'albums.name as name', 'albums.description as description', 'albums.created_at as created_at')
            ->where('album_id', $id)
            ->first();

        if ($retrieve == null) {
            $retrieve = DB::table('albums')
                ->select('albums.name', 'albums.description', 'albums.created_at')
                ->where('albums.id', $id)
                ->first();
            $images = [];
        } else {
            $images = json_decode($retrieve->images);
        }

        // dd($retrieve);
        return view('frontend.pages.gallery.single', compact('retrieve', 'images'));
    }

    public function contact()
    {
        $info = DB::table('institute_info')->first();
        return view('frontend.pages.contact', compact('info'));
    }


    // public function apa($routeName)
    // {
    //     // $currentRoute = app('router')->current();

    //     // if ($currentRoute->getName() == 'apa-gct') {
    //     //     $id = '1';
    //     // }
    //     // if ($currentRoute->getName() == 'apc') {
    //     //     $id = '2';
    //     // }
    //     // if ($currentRoute->getName() == 'mer') {
    //     //     $id = '3';
    //     // }
    //     // if ($currentRoute->getName() == 'mssl') {
    //     //     $id = '4';
    //     // }
    //     // if ($currentRoute->getName() == 'sccc') {
    //     //     $id = '5';
    //     // }
    //     // if ($currentRoute->getName() == 'fpo') {
    //     //     $id = '6';
    //     // }
    //     // if ($currentRoute->getName() == 'qamer') {
    //     //     $id = '7';
    //     // }
    //     // if ($currentRoute->getName() == 'laws') {
    //     //     $id = '8';
    //     // }
    //     // if ($currentRoute->getName() == 'nps') {
    //     //     $id = '9';
    //     // }
    //     // if ($currentRoute->getName() == 'committees') {
    //     //     $id = '10';
    //     // }
    //     // if ($currentRoute->getName() == 'schedule') {
    //     //     $id = '11';
    //     // }
    //     // if ($currentRoute->getName() == 'reports') {
    //     //     $id = '12';
    //     // }
    //     // if ($currentRoute->getName() == 'compendiums') {
    //     //     $id = '13';
    //     // }
    //     // if ($currentRoute->getName() == 'innovation-team') {
    //     //     $id = '14';
    //     // }
    //     // if ($currentRoute->getName() == 'aiap') {
    //     //     $id = '15';
    //     // }
    //     // if ($currentRoute->getName() == 'innovative-projects') {
    //     //     $id = '16';
    //     // }
    //     // if ($currentRoute->getName() == 'roaa') {
    //     //     $id = '17';
    //     // }
    //     // if ($currentRoute->getName() == 'appeal-form') {
    //     //     $id = '18';
    //     // }
    //     // if ($currentRoute->getName() == 'vdi') {
    //     //     $id = '19';
    //     // }
    //     // if ($currentRoute->getName() == 'guidelines') {
    //     //     $id = '20';
    //     // }
    //     // if ($currentRoute->getName() == 'appellate-officers') {
    //     //     $id = '21';
    //     // }
    //     // if ($currentRoute->getName() == 'cer') {
    //     //     $id = '22';
    //     // }
    //     // if ($currentRoute->getName() == 'complaint-filing') {
    //     //     $id = '23';
    //     // }
    //     // if ($currentRoute->getName() == 'complaint-laws') {
    //     //     $id = '24';
    //     // }

    //     $route_names = json_decode(DB::table('apa_categories')->select('route_name')->get());

    //     $data = DB::table('apa')
    //         ->join('apa_categories', 'apa.category_id', '=', 'apa_categories.id')
    //         ->where('apa_categories.route_name', $route_name)
    //         ->select('apa.*', 'apa_categories.name as name')
    //         ->latest('created_at')
    //         ->paginate(10);

    //     // $name = DB::table('apa_items')->where('id', $id)->value('name');

    //     return view('frontend.pages.apa.apa-list', ['route_names' => $route_names], compact('data'));
    // }


    public function apa($routeName)
    {
        $routeNames = DB::table('apa_categories')->pluck('route_name');

        if (!$routeNames->contains($routeName)) {
            abort(404);
        }

        $data = DB::table('apa')
            ->join('apa_categories', 'apa.category_id', '=', 'apa_categories.id')
            ->where('apa_categories.route_name', $routeName)
            ->select('apa.*', 'apa_categories.name as name')
            ->latest('created_at')
            ->paginate(10);

        $name = DB::table('apa_categories')->where('route_name', $routeName)->value('name');

        return view('frontend.pages.apa.apa-list', ['route_names' => $routeNames, 'data' => $data, 'name' => $name]);
    }

    public function apaDownload($name)
    {
        $path = public_path('apa/' . $name);
        return response()->download($path);
    }

    public function apaSingle($id, $name)
    {
        $apa = DB::table('apa')
            ->where('apa.id', $id)
            ->join('apa_categories', 'apa.category_id', '=', 'apa_categories.id')
            ->select('apa.*', 'apa_categories.name as category_name')
            ->get()
            ->first();
        $attachments = json_decode($apa->file);
        return view('frontend.pages.apa.single', compact('name', 'apa', 'attachments'));
    }


    //    Backend Being
    public function govern()
    {

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $resourcePath = resource_path('data/quotes.json');

        if (File::exists($resourcePath)) {
            $quotes = File::get($resourcePath);
            $data = json_decode($quotes, true);

            if (!empty($data)) {
                $randomIndex = array_rand($data);
                $randomItem = $data[$randomIndex];
            }
        }

        $counts = DB::select(
            DB::raw('
                SELECT
                    (SELECT COUNT(*) FROM users) AS users,
                    (SELECT COUNT(*) FROM notices) AS notices,
                    (SELECT COUNT(*) FROM apa) AS apas,
                    (SELECT COUNT(*) FROM faculty) AS faculty,
                    (SELECT COUNT(*) FROM albums) AS albums
            ')
        );
        $machineryItemCount = json_decode(DB::table('data')->where('target', 'machinery')->value('data'));

        $counts = $counts[0];
        $primaryArray = array_merge((array)$counts);
        $primaryArray['machineries'] = count($machineryItemCount->items);

        return view('area52.govern', compact('randomItem', 'primaryArray'));
    }

    public function slider()
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        return view('area52.home.slider.add-slider');
    }

    public function updatehistory()
    {
        if (!Auth::user()->hasRole(['nuke', 'admin'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $history = json_decode(\DB::table('data')->where('target', 'history')->value('data'));

        return view('area52.history', compact('history'));
    }

    public function machine()
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $machinery = json_decode(DB::table('data')->where('target', 'machinery')->value('data'));
        $list = $machinery->items;
        return view('area52.home.machine.machine', compact('machinery', 'list'));
    }

    public function updatePrincipal()
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $id = 1;
        $principal = DB::table('principal')->where('id', $id)->get()->first();
        $designations = DB::table('designations')->get();

        return view('area52.principal.principal', compact('principal', 'designations'));
    }

    public function updateFormerPrincipal($id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $retrieve = DB::table('former_principals')
            ->where('former_principals.id', $id)
            ->join('designations', 'former_principals.designation', '=', 'designations.id')
            ->select('former_principals.*', 'designations.designation as designation')
            ->get()
            ->first();
        $designations = DB::table('designations')->get();
        return view('area52.administration.former-principal-edit', compact('retrieve', 'designations'));
    }

    public function updateFormerEmployee($id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $retrieve = DB::table('former_employees')
            ->where('former_employees.id', $id)
            ->join('designations', 'former_employees.designation', '=', 'designations.id')
            ->select('former_employees.*', 'designations.designation as designation')
            ->get()
            ->first();
        $designations = DB::table('designations')->get();
        return view('area52.administration.former-employee-edit', compact('retrieve', 'designations'));
    }
}
