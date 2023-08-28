<?php

namespace App\Http\Controllers;

use App\Models\Designations;
use Illuminate\Http\Request;
use App\Http\Requests\DesignationRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DesignationsController extends Controller
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
    public function create(Designations $designations)
    {

        if (!Auth::user()->hasRole(['nuke', 'admin'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $designations = Designations::paginate(10);


        return view('area52.designations.create', compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignationRequest $request, Designations $designations)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();
        $designations->designation = $request->designation;
        $designations->created_at = now();
        $designations->updated_at = now();
        $designations->save();

        return redirect()->back()->with('success', 'Designation added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function show(Designations $designations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function edit(Designations $designations, $id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $designation = Designations::find($id);

        // dd($designation);

        return view('area52.designations.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function update(DesignationRequest $request, Designations $designations, $id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();
        $designations = Designations::find($id);
        $designations->designation = $request->designation;
        $designations->updated_at = now();
        $designations->update();

        return redirect()->route('designations-view')->with('success', 'Designation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designations  $designations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designations $designations, $id)
    {
        if (!Auth::user()->hasRole(['nuke', 'admin'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        // delete designation
        $designations = Designations::find($id);
        $designations->delete();

        return redirect()->back()->with('success', 'Designation deleted successfully');
    }
}
