<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\formerPrincipalRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class formerPrincipal extends Controller
{
    public function addPrincipal(formerPrincipalRequest $request)
    {

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();
        $name = $request->name;
        $designation = $request->designation;
        $from = $request->from;
        $to = $request->to;

        $data = [
            'name' => $name,
            'designation' => $designation,
            'from' => $from,
            'to' => $to,
        ];

        DB::table('former_principals')->insert($data);

        return redirect()->back()->with('success', 'Principal added successfully');
    }

    public function editPrincipal(formerPrincipalRequest $request, $id)
    {

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();
        $name = $request->name;
        $designation = $request->designation;
        $from = $request->from;
        $to = $request->to;

        $data = [
            'name' => $name,
            'designation' => $designation,
            'from' => $from,
            'to' => $to,
        ];

        DB::table('former_principals')->where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Principal updated successfully');
    }

    public function principalList()
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }


        $principals = DB::table('former_principals')
            ->join('designations', 'former_principals.designation', '=', 'designations.id')
            ->select('former_principals.*', 'designations.designation as designation')
            ->get();
        $designations = DB::table('designations')->get();
        return view('area52.administration.former-principals', compact('principals', 'designations'));
    }

    public function destroy($id)
    {

        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        DB::table('former_principals')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Principal removed successfully');
    }


    public function addEmployee(formerPrincipalRequest $request)
    {


        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();
        $name = $request->name;
        $designation = $request->designation;
        $from = $request->from;
        $to = $request->to;

        $data = [
            'name' => $name,
            'designation' => $designation,
            'from' => $from,
            'to' => $to,
        ];

        DB::table('former_employees')->insert($data);

        return redirect()->back()->with('success', 'Employee/Officer added successfully');
    }

    public function editEmployee(formerPrincipalRequest $request, $id)
    {
        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();
        $name = $request->name;
        $designation = $request->designation;
        $from = $request->from;
        $to = $request->to;

        $data = [
            'name' => $name,
            'designation' => $designation,
            'from' => $from,
            'to' => $to,
        ];

        DB::table('former_employees')->where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Employee/Officer updated successfully');
    }

    public function employeeList()
    {

        if (!Auth::user()->hasRole('nuke|admin|moderator')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $employees = DB::table('former_employees')
            ->join('designations', 'former_employees.designation', '=', 'designations.id')
            ->select('former_employees.*', 'designations.designation as designation')
            ->get();
        $designations = DB::table('designations')->get();
        return view('area52.administration.former-employee', compact('employees', 'designations'));
    }

    public function employeeDestroy($id)
    {


        if (!Auth::user()->hasRole('nuke|admin')) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }


        DB::table('former_employees')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Employee/Officer removed successfully');
    }
}
