<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class APAContoller extends Controller
{
    public function index()
    {
        $categories = DB::table('apa_categories')->get();
        $items = DB::table('apa_items')
            ->join('apa_categories', 'apa_items.category_id', '=', 'apa_categories.id')
            ->select('apa_items.*', 'apa_categories.name as category_name')
            ->get();


        return view('area52.apa.add-apa', compact('items', 'categories'));
    }

    public function list()
    {
        $apa = DB::table('apa')
            ->join('apa_items', 'apa.category_id', '=', 'apa_items.id')
            ->select('apa.*', 'apa_items.name as item_name')
            ->latest('created_at')
            ->paginate(10);

        return view('area52.apa.apa-list', compact('apa'));
    }

    public function addAPA(Request $request)
    {
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
                        'apa.' . $key . '.attach' => 'file|mimes:pdf,doc,docx|max:10240',
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
        $categories = DB::table('apa_categories')->get();
        $items = DB::table('apa_items')
            ->join('apa_categories', 'apa_items.category_id', '=', 'apa_categories.id')
            ->select('apa_items.*', 'apa_categories.name as category_name')
            ->get();

        $apa = DB::table('apa')
            ->join('apa_items', 'apa.category_id', '=', 'apa_items.id')
            ->select('apa.*', 'apa_items.name as items_name')
            ->where('apa.id', $id)
            ->first();

        $attachment = json_decode($apa->file);

        return view('area52.apa.edit-apa', compact('apa', 'attachment', 'categories', 'items'));
    }

    public function destroy($id)
    {
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
}
