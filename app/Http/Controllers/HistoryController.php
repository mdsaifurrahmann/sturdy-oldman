<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HistoryRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function update(HistoryRequest $request)
    {

        $request->validated();

        $retrive = json_decode(\DB::table('data')->where('target', 'history')->value('data'));

        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/institute/' . $retrive->image))) {
                File::delete(public_path('images/institute/' . $retrive->image));
            }
            $image = $request->file('image');
            $imageName = time() . '-history-' . Str::random(16) . '.' . $image->extension();
            $image->move(public_path('images/institute'), $imageName);
        } else {
            $imageName = $retrive->image;
        }

        $data = [
            'title' => $request->title,
            'history' => $request->history,
            'image' => $imageName,
        ];

        // update with json
        DB::table('data')->where('target', 'history')->update([
            'data' => json_encode($data)
        ]);

        return redirect()->back()->with('success', 'History updated successfully');
    }
}
