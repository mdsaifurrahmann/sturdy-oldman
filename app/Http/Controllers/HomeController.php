<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;


class HomeSliderController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $slider = $request->slider;
        $data = [];
        foreach ($slider as $key => $value) {
            if ($file = $request->hasFile('slider.' . $key . '.image')) {

                $image = 'slider.' . $key . '.image';
                $title = 'slider.' . $key . '.title';
                $desc = 'slider.' . $key . '.desc';

                $request->validate([
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

        $retriveData = json_decode(DB::table('home_data')->where('target', 'slider')->value('data'));

        $final = array_merge($retriveData, $data);

        DB::table('home_data')->update([
            'target' => 'slider',
            'data' => json_encode($final),
        ]);

        return redirect()->back()->with('success', 'Slider Added Successfully');
    }

    public function sliderList()
    {
        $data = json_decode(DB::table('home_data')->where('target', 'slider')->value('data'));
        return view('frontend.home', compact('data'));
    }

    public function destroy($id)
    {
        $data = json_decode(DB::table('home_data')->where('target', 'slider')->value('data'));

        $reinsert = array();

        foreach ($data as $key => $value) {
            // remove item from array
            if ($key == $id) {
                \File::exists(public_path('/images/slider/' . $value->image)) ? File::delete(public_path('/images/slider/' . $value->image)) : null;
            } else {
                array_push($reinsert, $value);
            }
        }

        DB::table('home_data')->where('target', 'slider')->update([
            'data' => json_encode($reinsert),
        ]);
    }
}
