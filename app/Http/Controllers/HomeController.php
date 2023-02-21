<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function create(Request $request)
    {

        if (!Auth::check()) {
            redirect()->route('login');
        }

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        try {
            $slider = $request->slider;
            $data = [];
            foreach ($slider as $key => $value) {
                if ($file = $request->hasFile('slider.' . $key . '.image')) {

                    $image = 'slider.' . $key . '.image';
                    $title = 'slider.' . $key . '.title';
                    $desc = 'slider.' . $key . '.desc';

                    $validator = $request->validate([
                        $image => 'required|image|mimes:jpeg,png,jpg|max:1024',
                        $title => 'required|string',
                        $desc => 'required|string',
                    ]);

                    $file = $request->file('slider.' . $key . '.image');
                    $fileName = time() . Str::random(16) . '-slider-' . $key . '.' . $file->extension();
                    $destinationPath = public_path() . '/images/slider';
                    $file->move($destinationPath, $fileName);
                    $slider[$key]['image'] = $fileName;

                    $info = [
                        'title' => $request->input($title),
                        'desc' => $request->input($desc),
                        'image' => $fileName,
                    ];

                    array_push($data, $info);
                }
            }

            $retriveData = json_decode(DB::table('data')->where('target', 'slider')->value('data'));

            $final = array_merge($retriveData, $data);

            DB::table('data')->where('target', 'slider')->update([
                'data' => json_encode($final),
            ]);

            return redirect()->back()->with('success', 'Slider Added Successfully');
        } catch (\Exception $e) {
            // set error message

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function sliderList()
    {

        if (!Auth::check()) {
            redirect()->route('login');
        }

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $sliders = json_decode(DB::table('data')->where('target', 'slider')->value('data'));
        return view('area52.home.slider.list-slider', compact('sliders'));
    }

    public function destroy($id)
    {
        $data = json_decode(DB::table('data')->where('target', 'slider')->value('data'));

        $reinsert = array();

        foreach ($data as $key => $value) {
            // remove item from array
            if ($key == $id) {
                \File::exists(public_path('/images/slider/' . $value->image)) ? File::delete(public_path('/images/slider/' . $value->image)) : null;
            } else {
                array_push($reinsert, $value);
            }
        }

        DB::table('data')->where('target', 'slider')->update([
            'data' => json_encode($reinsert),
        ]);

        return redirect()->back()->with('success', 'Slider Deleted Successfully');
    }


    public function machine(Request $request)
    {

        if (!Auth::check()) {
            redirect()->route('login');
        }

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $getDesc = json_decode(DB::table('data')->where('target', 'machinery')->value('data'));

        if (isset($request->description)) {
            $request->validate([
                'description' => 'string',
            ]);
            $data = [
                'description' => $request->description,
            ];
        } else {
            $data = [
                'description' => $getDesc->description,
            ];
        }

        $machine = $request->machine;

        $prevItems = $getDesc->items;

        foreach ($machine as $key => $value) {
            $machine = 'machine.' . $key . '.name';


            if (!empty($request->input($machine))) {
                $request->validate([
                    $machine => 'string',
                ]);

                $info = $request->input($machine);

                $data['items'][] = $info;
            }
        }

        if (!empty($request->input($machine))) {
            $merge = array_merge($prevItems, $data['items']);
        } else {
            $merge = $prevItems;
        }



        $final = [
            'description' => $data['description'],
            'items' => $merge,
        ];

        DB::table('data')->where('target', 'machinery')->update([
            'data' => json_encode($final),
        ]);

        return redirect()->back()->with('success', 'Machinery Items updated Successfully');
    }

    public function machineDestroy($id)
    {

        if (!Auth::check()) {
            redirect()->route('login');
        }

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }


        $data = json_decode(DB::table('data')->where('target', 'machinery')->value('data'));

        $list = $data->items;

        $reinsert = array();

        foreach ($list as $key => $value) {

            if ($key == $id) {
                continue;
            } else {
                array_push($reinsert, $value);
            }
        }

        DB::table('data')->where('target', 'machinery')->update([
            'data' => json_encode(
                [
                    'description' => $data->description,
                    'items' => $reinsert,
                ]
            ),
        ]);

        return redirect()->back()->with('success', 'Machinery Items Deleted Successfully');
    }
}
