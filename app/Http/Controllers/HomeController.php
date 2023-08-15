<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\File;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function create(Request $request)
    {

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

                    $validator = $request->validate(
                        [
                            $image => 'required|image|mimes:jpeg,png,jpg|max:1024',
                            $title => 'required|string',
                            $desc => 'required|string',
                        ],
                        [
                            'slider.' . $key . '.image.required' => 'Please select image',
                            'slider.' . $key . '.image.image' => 'Please select image',
                            'slider.' . $key . '.image.mimes' => 'Image must be jpeg, png or jpg',
                            'slider.' . $key . '.image.max' => 'Image size must be less than 1MB',
                            'slider.' . $key . '.title.required' => 'Please enter title',
                            'slider.' . $key . '.desc.required' => 'Please enter description',
                            'slider.' . $key . '.title.string' => 'Title must be string',
                            'slider.' . $key . '.desc.string' => 'Description must be string',
                        ]
                    );

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

    public function sliderUpdateView($id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $target = 'slider';

        // Retrieve the existing JSON data
        $retrievedData = json_decode(DB::table('data')->where('target', $target)->value('data'), true);

        if (!is_array($retrievedData)) {
            // Handle case where data is not a valid array
            return redirect()->back()->with('error', 'Invalid data format');
        }

        $item = $retrievedData[$id] ?? null;


        return view('area52.home.slider.update-slider', compact('item', 'id'));
    }

    public function sliderUpdate(Request $request, $id)
    {
        $target = 'slider';

        // Retrieve the existing JSON data
        $retrievedData = json_decode(DB::table('data')->where('target', $target)->value('data'), true);

        if (!is_array($retrievedData)) {
            // Handle case where data is not a valid array
            return redirect()->back()->with('error', 'Invalid data format');
        }

        $item = $retrievedData[$id] ?? null;

        if (!$item) {
            // Handle case where the index is out of bounds
            return redirect()->back()->with('error', 'Invalid index');
        }

        $validator = $request->validate([
            'title' => 'required|string',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'title.required' => 'Please enter title',
            'desc.required' => 'Please enter description',
            'image.image' => 'Please select a valid image',
            'image.mimes' => 'Image must be jpeg, png or jpg',
            'image.max' => 'Image size must be less than 1MB',
            'title.string' => 'Title must be a string',
            'desc.string' => 'Description must be a string',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image file
            File::exists(public_path('/images/slider/' . $item['image'])) ? File::delete(public_path('/images/slider/' . $item['image'])) : null;

            $file = $request->file('image');
            $fileName = time() . Str::random(16) . '-slider-' . $id . '.' . $file->extension();
            $destinationPath = public_path('/images/slider');

            // Move the new image file
            $file->move($destinationPath, $fileName);
            $item['image'] = $fileName;
        }

        $item['title'] = $request->input('title');
        $item['desc'] = $request->input('desc');

        // Update the specific item in the array
        $retrievedData[$id] = $item;

        // Update the 'data' column with modified JSON data
        DB::table('data')->where('target', $target)->update([
            'data' => json_encode($retrievedData),
        ]);

        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }


    public function sliderList()
    {


        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $sliders = json_decode(DB::table('data')->where('target', 'slider')->value('data'));
        return view('area52.home.slider.list-slider', compact('sliders'));
    }

    public function destroy($id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

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
