<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;


class APAController extends Controller
{

    public function index()
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $categories = DB::table('apa_types')->get();
        $items = DB::table('apa_categories')
            ->join('apa_types', 'apa_categories.type_id', '=', 'apa_types.id')
            ->select('apa_categories.*', 'apa_types.name as category_name')
            ->get();


        return view('area52.apa.add-apa', compact('items', 'categories'));
    }

    public function list()
    {
        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $apa = DB::table('apa')
            ->join('apa_categories', 'apa.category_id', '=', 'apa_categories.id')
            ->select('apa.*', 'apa_categories.name as item_name')
            ->latest('created_at')
            ->paginate(10);

        return view('area52.apa.apa-list', compact('apa'));
    }

    public function addAPA(Request $request)
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validate(
            [
                'title' => 'required|string',
                'date' => 'required|date',
                'time' => 'required|string',
                'category_id' => 'required|int',
            ],
            [
                'title.required' => 'Title is required',
                'date.required' => 'Date is required',
                'time.required' => 'Time is required',
            ]
        );

        $title = $request->title;
        $date = $request->date;
        $time = $request->time;
        $category_id = $request->category_id;

        if (!empty($request->desc)) {
            $desc = $request->desc;
        } else {
            $desc = 'No description provided!';
        }

        $attachment = $request->apa;

        if (empty($attachment)) {
            $request->validate(
                [
                    'apa' => 'required',
                ],
                [
                    'apa.required' => 'At least one attachment is required',
                ]
            );
        }

        $data = [];

        foreach ($attachment as $key => $value) {
            if ($request->hasFile('apa.' . $key . '.attach')) {
                $request->validate(
                    [
                        'apa.' . $key . '.attach' => 'file|mimes:pdf,doc,docx,jpg,png,jpeg|max:10240',
                    ],
                    [
                        'apa.' . $key . '.attach.file' => 'Attachment must be a file',
                        'apa.' . $key . '.attach.mimes' => 'Attachment must be a file of type: pdf, doc, docx',
                        'apa.' . $key . '.attach.max' => 'Attachment may not be greater than 10 megabytes',
                    ]
                );

                $file = $request->file('apa.' . $key . '.attach');

                $filename = time() . Str::random(16) . '-apa-' . Str::replace(' ', '-', $file->getClientOriginalName());

                $destinationPath = public_path() . '/apa';

                $file->move($destinationPath, $filename);

                $data[] = $filename;
            }
        }

        $gather = [
            'title' => $title,
            'desc' => $desc,
            'date' => $date,
            'time' => $time,
            'category_id' => $category_id,
            'file' => json_encode($data),
            'updated_at' => now(),
            'created_at' => now(),
        ];

        DB::table('apa')->insert($gather);

        return redirect()->back()->with('success', 'APA added successfully');
    }

    public function edit($id)
    {
        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $categories = DB::table('apa_types')->get();
        $items = DB::table('apa_categories')
            ->join('apa_types', 'apa_categories.type_id', '=', 'apa_types.id')
            ->select('apa_categories.*', 'apa_types.name as category_name')
            ->get();

        $apa = DB::table('apa')
            ->join('apa_categories', 'apa.category_id', '=', 'apa_categories.id')
            ->select('apa.*', 'apa_categories.name as items_name')
            ->where('apa.id', $id)
            ->first();

        $attachment = json_decode($apa->file);

        return view('area52.apa.edit-apa', compact('apa', 'attachment', 'categories', 'items'));
    }

    public function destroy($id)
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $retrive = DB::table('apa')->where('id', $id)->first();
        $file = json_decode($retrive->file);
        foreach ($file as $single) {
            if (File::exists(public_path() . '/apa/' . $single)) {
                File::delete(public_path() . '/apa/' . $single);
            }
        }
        DB::table('apa')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Notice deleted successfully');
    }

    public function updateFile($id, $item)
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $getDB = DB::table('apa')->where('id', $id)->first();
        $getFiles = json_decode($getDB->file);

        // delete single file
        if (File::exists(public_path() . '/apa/' . $getFiles[$item])) {
            File::delete(public_path() . '/apa/' . $getFiles[$item]);
        }

        // push blank array to that key
        $reinsert = array();

        foreach ($getFiles as $key => $value) {
            if ($key == $item) {
                continue;
            } else {
                array_push($reinsert, $value);
            }
        }

        // now update database
        $update = [
            'file' => json_encode($reinsert),
            'updated_at' => now(),
        ];

        DB::table('apa')->where('id', $id)->update($update);

        return redirect()->back()->with('success', 'File deleted successfully');
    }

    public function update(Request $request, $id)
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $retrive = DB::table('apa')->where('id', $id)->first();

        $request->validate(
            [
                'title' => 'required|string',
                'desc' => 'required|string',
                'date' => 'required|date',
                'time' => 'required|string',
                'category_id' => 'required|int',
            ],
            [
                'title.required' => 'Title is required',
                'desc.required' => 'Description is required',
                'date.required' => 'Date is required',
                'time.required' => 'Time is required',
            ]
        );

        $title = $request->title;
        $date = $request->date;
        $time = $request->time;
        $category_id = $request->category_id;

        if (!empty($request->desc)) {
            $desc = $request->desc;
        } else {
            $desc = 'No description provided!';
        }

        $attachment = $request->apa;

        $data = [];

        if (!empty($request->apa)) {
            foreach ($attachment as $key => $value) {
                if ($request->hasFile('apa.' . $key . '.attach')) {
                    $request->validate(
                        [
                            'apa.' . $key . '.attach' => 'file|mimes:pdf,doc,docx|max:10240',
                        ],
                        [
                            'apa.' . $key . '.attach.file' => 'Attachment must be a file',
                            'apa.' . $key . '.attach.mimes' => 'Attachment must be a file of type: pdf, doc, docx',
                            'apa.' . $key . '.attach.max' => 'Attachment may not be greater than 10 Megabytes',
                        ]
                    );

                    $file = $request->file('apa.' . $key . '.attach');

                    $filename = time() . Str::random(16) . '-apa-' . Str::replace(' ', '-', $file->getClientOriginalName());

                    $destinationPath = public_path() . '/apa';

                    $file->move($destinationPath, $filename);


                    // merge new array with old array

                    $retriveFiles = json_decode($retrive->file);

                    $data[] = $filename;

                    $merge = array_merge($retriveFiles, $data);
                }
            }
        } else {
            $file = json_decode($retrive->file);
            $merge = $file;
        }

        $gather = [
            'title' => $title,
            'desc' => $desc,
            'date' => $date,
            'time' => $time,
            'category_id' => $category_id,
            'file' => json_encode($merge),
            'updated_at' => now(),
        ];

        DB::table('apa')->where('id', $id)->update($gather);

        return redirect()->back()->with('success', 'APA updated successfully');
    }

    public function addTypeView()
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You have not enough permission to create APA Type');
        }

        $apa_type = DB::table('apa_types')->orderBy('created_at')->latest('created_at')->paginate(10);

        return view('area52.apa.add-type', compact('apa_type'));
    }

    public function addType(Request $request)
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You have not enough permission to create APA Type');
        }

        $request->validate(
            [
                'type' => 'required|string',
                'image' => 'required|file|mimes:png,jpg,svg|max:512'
            ],
            [
                'type.required' => 'APA Type is required',
                'image.required' => 'Image is required',
                'image.file' => 'Image must be a file',
                'image.mimes' => 'Image must should be png, jpg or svg',
                'image.max' => 'Maximum image upload size is 512KB'
            ]
        );

        $type = $request->type;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . Str::random(16) . '-apa-type-' . Str::replace(' ', '-', $file->getClientOriginalName());

            $destinationPath = public_path() . '/apa/types';

            $file->move($destinationPath, $filename);
        }


        $gather = [
            'name' => $type,
            'image' => $filename,
            'updated_at' => now(),
            'created_at' => now(),
        ];

        DB::table('apa_types')->insert($gather);

        return redirect()->back()->with('success', 'APA Type added successfully');
    }

    public function typeEditView($id)
    {
        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You have not enough permission to Edit APA Type');
        }

        $retrieve = DB::table('apa_types')->where('id', $id)->first();

        return view('area52.apa.edit-type', compact('retrieve'));
    }

    public function editType(Request $request, $id)
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You have not enough permission to Edit APA Type');
        }

        $retrieve = DB::table('apa_types')->where('id', $id)->first();

        $request->validate(
            [
                'type' => 'required|string',
                'image' => 'file|mimes:png,jpg,svg|max:512'
            ],
            [
                'type.required' => 'APA Type is required',
                'image.file' => 'Image must be a file',
                'image.mimes' => 'Image must should be png, jpg or svg',
                'image.max' => 'Maximum image upload size is 512KB'
            ]
        );

        $type = $request->type;

        if ($request->hasFile('image')) {

            $retrieve = DB::table('apa_types')->where('id', $id)->value('image');
            // delete single file
            if (File::exists(public_path() . '/apa/types/' . $retrieve)) {
                File::delete(public_path() . '/apa/types/' . $retrieve);
            }

            $file = $request->file('image');

            $filename = time() . Str::random(16) . '-apa-type-' . Str::replace(' ', '-', $file->getClientOriginalName());

            $destinationPath = public_path() . '/apa/types';

            $file->move($destinationPath, $filename);
        } else {
            $filename = DB::table('apa_types')->where('id', $id)->value('image');
        }

        $gather = [
            'name' => $type,
            'image' => $filename,
            'updated_at' => now(),
        ];

        DB::table('apa_types')->where('id', $id)->update($gather);

        return redirect()->route('add-type-view')->with('success', 'APA Type updated successfully', compact('retrieve'));
    }

    public function typeDestroy($id)
    {
        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to Delete APA Type or Category');
        }

        $retrieve = DB::table('apa_types')->where('id', $id)->value('image');
        // delete single file
        if (File::exists(public_path() . '/apa/types/' . $retrieve)) {
            File::delete(public_path() . '/apa/types/' . $retrieve);
        }

        DB::table('apa_types')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'APA Type deleted successfully');
    }

    public function addCategoryView()
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to Add APA Type or Category');
        }

        $retrieve = DB::table('apa_types')->get();


        $categories = DB::table('apa_categories')
            ->join('apa_types', 'apa_categories.type_id', '=', 'apa_types.id')
            ->select('apa_categories.*', 'apa_types.name as type_name')
            ->paginate(20);



        return view('area52.apa.add-category', compact('retrieve', 'categories'));
    }

    public function addCategory(Request $request)
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to Add APA Type or Category');
        }

        $request->validate(
            [
                'cat_name' => "required|string",
                'type_id' => "required|int",
                'route_name' => 'string|required|unique:apa_categories,route_name'
            ],
            [
                'cat_name.required' => "Category name is required!",
                'type_id.required' => 'APA Type is required!',
                'route_name.required' => 'Route Name is required',
                'cat_name.string' => 'Category Name must be string',
                'type_id.int' => 'APA type value must be int',
                'route_name.string' => 'Route Name must be string',
                'route_name.unique' => 'Route name must be unique and related to your category name'
            ]
        );

        $cat_name = $request->cat_name;
        $type = $request->type_id;
        $route_name = $request->route_name;

        $data = [
            'name' => $cat_name,
            'type_id' => $type,
            'route_name' => $route_name,
            'created_at' => now(),
            'updated_at' => now()
        ];

        \DB::table('apa_categories')->insert($data);

        return redirect()->back()->with('success', 'APA Category created successfully!');
    }

    public function editCategoryView($id)
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to edit APA Type or Category');
        }

        $retrieve = DB::table('apa_categories')
            ->where('apa_categories.id', $id)
            ->join('apa_types', 'apa_categories.type_id', '=', 'apa_types.id')
            ->select('apa_categories.*', 'apa_types.name as type_name')
            ->first();
        $types = DB::table('apa_types')->get();

        return view('area52.apa.edit-category', compact('retrieve', 'types'));
    }

    public function editCategory(Request $request, $id)
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to edit APA Type or Category');
        }

        $request->validate(
            [
                'cat_name' => "required|string",
                'type_id' => "required|int",
                'route_name' => ['string', 'required', Rule::unique('apa_categories', 'route_name')->ignore($id)]
            ],
            [
                'cat_name.required' => "Category name is required!",
                'type_id.required' => 'APA Type is required!',
                'route_name.required' => 'Route Name is required',
                'cat_name.string' => 'Category Name must be string',
                'type_id.int' => 'APA type value must be int',
                'route_name.string' => 'Route Name must be string',
                'route_name.unique' => 'Route name must be unique and related to your category name'
            ]
        );

        $cat_name = $request->cat_name;
        $type = $request->type_id;
        $route_name = $request->route_name;

        $data = [
            'name' => $cat_name,
            'type_id' => $type,
            'route_name' => $route_name,
            'updated_at' => now()
        ];

        \DB::table('apa_categories')
            ->where('id', $id)
            ->update($data);

        return redirect()->back()->with('success', 'APA Category updated successfully!');
    }

    public function destroyCategory($id)
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to Delete APA Type or Category');
        }

        DB::table('apa_categories')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'APA Category deleted successfully');
    }
}
