<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use Illuminate\Http\Request;
use App\Http\Requests\facultyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class FacultyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(faculty $faculty)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $members = $faculty->get();
        return view('area52.faculty.index', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(facultyRequest $request, faculty $faculty)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $technology = $request->technology;
        $mobile = $request->mobile;
        $designation = $request->designation;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nameHandler = time() . '-faculty-' . Str::random(16) . '.' . $file->extension();
        }

        $assertion = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'technology' => $technology,
            'mobile' => $mobile,
            'designation' => $designation,
            'image' => $nameHandler,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        if ($faculty->create($assertion)) {
            $file->move(public_path('images/faculty/'), $nameHandler);
        }

        return redirect()->back()->with('success', 'Faculty member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(faculty $faculty, $id)
    {

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $retrieve = $faculty->find($id);
        return view('area52.faculty.edit', compact('retrieve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(facultyRequest $request, faculty $faculty, $id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $retrieve = $faculty->find($id);


        $request->validated();
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $technology = $request->technology;
        $mobile = $request->mobile;
        $designation = $request->designation;

        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/faculty/' . $retrieve->image))) {
                File::delete(public_path('images/faculty/' . $retrieve->image));
            }

            $file = $request->file('image');
            $nameHandler = time() . '-faculty-' . Str::random(16) . '.' . $file->extension();
        } else {
            $nameHandler = $retrieve->image;
        }

        $assertion = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'technology' => $technology,
            'mobile' => $mobile,
            'designation' => $designation,
            'image' => $nameHandler,
            'updated_at' => now(),
        ];


        if ($request->hasFile('image')) {
            if ($faculty->where('id', $id)->update($assertion)) {
                $file->move(public_path('images/faculty/'), $nameHandler);
            }
        } else {
            $faculty->where('id', $id)->update($assertion);
        }



        return redirect()->back()->with('success', 'Faculty member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(faculty $faculty, $id)
    {

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $retrieve = $faculty->find($id);

        if (File::exists(public_path('images/faculty/' . $retrieve->image))) {
            File::delete(public_path('images/faculty/' . $retrieve->image));
        }

        $faculty->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Faculty member deleted successfully');
    }
}
