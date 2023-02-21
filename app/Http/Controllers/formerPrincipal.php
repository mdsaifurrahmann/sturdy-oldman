<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\formerPrincipalRequest;
use Illuminate\Support\Facades\DB;


class formerPrincipal extends Controller
{
    public function addPrincipal(formerPrincipalRequest $request)
    {
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

    public function principalList()
    {
        $principals = DB::table('former_principals')->get();
        return view('area52.administration.former-principals', compact('principals'));
    }

    public function destroy($id)
    {
        DB::table('former_principals')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Principal removed successfully');
    }



    public function addEmployee(formerPrincipalRequest $request)
    {
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

    public function employeeList()
    {
        $employees = DB::table('former_employees')->get();
        return view('area52.administration.former-employee', compact('employees'));
    }

    public function employeeDestroy($id)
    {
        DB::table('former_employees')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Employee/Officer removed successfully');
    }
}
