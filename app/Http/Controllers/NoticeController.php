<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{

    public function index()
    {
        $categories = DB::table('notice_categories')->get();
        return view('area52.notice.add-notice', compact('categories'));
    }

    public function view()
    {
        $notices = DB::table('notices')
            ->latest('created_at')
            ->paginate(10);

        return view('area52.notice.notice-list', compact('notices'));
    }

    public function addNotice(Request $request)
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

        $attachment = $request->notice;

        if (empty($attachment)) {
            $request->validate(
                [
                    'notice' => 'required',
                ],
                [
                    'notice.required' => 'At least one attachment is required',
                ]
            );
        }

        $data = [];

        foreach ($attachment as $key => $value) {
            if ($request->hasFile('notice.' . $key . '.attach')) {
                $request->validate(
                    [
                        'notice.' . $key . '.attach' => 'file|mimes:pdf,doc,docx|max:10240',
                    ],
                    [
                        'notice.' . $key . '.attach.file' => 'Attachment must be a file',
                        'notice.' . $key . '.attach.mimes' => 'Attachment must be a file of type: pdf, doc, docx',
                        'notice.' . $key . '.attach.max' => 'Attachment may not be greater than 10 megabytes',
                    ]
                );

                $file = $request->file('notice.' . $key . '.attach');

                $filename = time() . Str::random(16) . '-notice-' . $file->getClientOriginalName();

                $destinationPath = public_path() . '/notices';

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

        DB::table('notices')->insert($gather);

        return redirect()->back()->with('success', 'Notice added successfully');
    }

    public function edit($id)
    {
        $notice = DB::table('notices')->join('notice_categories', 'notices.category_id', '=', 'notice_categories.id')->select('notices.*', 'notice_categories.name as category_name')->where('notices.id', $id)->first();

        $attachment = json_decode($notice->file);

        $categories = DB::table('notice_categories')->get();

        return view('area52.notice.edit-notice', compact('notice', 'attachment', 'categories'));
    }

    public function destroy($id)
    {
        $retrive = DB::table('notices')->where('id', $id)->first();
        $file = json_decode($retrive->file);
        foreach ($file as $single) {
            if (File::exists(public_path() . '/notices/' . $single)) {
                File::delete(public_path() . '/notices/' . $single);
            }
        }
        DB::table('notices')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Notice deleted successfully');
    }

    public function updateFile($id, $item)
    {
        $getDB = DB::table('notices')->where('id', $id)->first();
        $getFiles = json_decode($getDB->file);

        // delete single file
        if (File::exists(public_path() . '/notices/' . $getFiles[$item])) {
            File::delete(public_path() . '/notices/' . $getFiles[$item]);
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

        DB::table('notices')->where('id', $id)->update($update);

        return redirect()->back()->with('success', 'File deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $retrive = DB::table('notices')->where('id', $id)->first();

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

        $attachment = $request->notice;

        $data = [];

        if (!empty($request->notice)) {
            foreach ($attachment as $key => $value) {
                if ($request->hasFile('notice.' . $key . '.attach')) {
                    $request->validate(
                        [
                            'notice.' . $key . '.attach' => 'file|mimes:pdf,doc,docx|max:10240',
                        ],
                        [
                            'notice.' . $key . '.attach.file' => 'Attachment must be a file',
                            'notice.' . $key . '.attach.mimes' => 'Attachment must be a file of type: pdf, doc, docx',
                            'notice.' . $key . '.attach.max' => 'Attachment may not be greater than 10 Megabytes',
                        ]
                    );

                    $file = $request->file('notice.' . $key . '.attach');

                    $filename = time() . Str::random(16) . '-notice-' . $file->getClientOriginalName();

                    $destinationPath = public_path() . '/notices';

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

        DB::table('notices')->where('id', $id)->update($gather);

        return redirect()->back()->with('success', 'Notice updated successfully');
    }
}
