<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrincipalRequest;
use App\Models\PrincipalModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class principal extends Controller
{
    public function update(PrincipalRequest $request, PrincipalModel $principal)
    {

        if (!Auth::check()) {
            redirect()->route('login');
        }

        if (!Auth::user()->hasRole(['nuke', 'admin', 'moderator'])) {
            return redirect()->route('govern')->with('error', 'You are not authorized to access this page');
        }

        $request->validated();

        $principal = PrincipalModel::where('id', '1')->get()->first();

        if ($request->hasFile('pi')) {

            if (File::exists(public_path('images/principal/' . $principal->pi))) {
                File::delete(public_path('images/principal/' . $principal->pi));
            }

            $piFile = $request->file('pi');
            $piNameHandler = time() . '-principal-' . Str::random(16) . '.' . $piFile->extension();
            $piFile->move(public_path('images/principal/'), $piNameHandler);
        } else {
            $piNameHandler = $principal->pi;
        }

        if ($request->hasFile('pip')) {
            if (File::exists(public_path('images/principal/' . $principal->pip))) {
                File::delete(public_path('images/principal/' . $principal->pip));
            }

            $pipFile =  $request->file('pip');
            $pipNameHandler = time() . '-principal-passport-' . Str::random(16) . '.' . $pipFile->extension();
            $pipFile->move(public_path('images/principal/'), $pipNameHandler);
        } else {
            $pipNameHandler = $principal->pip;
        }

        PrincipalModel::findOrFail('1')->update([
            'message' => $request->message,
            'position' => $request->position,
            'description' => $request->description,
            'qop' => $request->qop,
            'principal_name' => $request->principal_name,
            'institute' => $request->institute,
            'pi' => $piNameHandler,
            'pip' => $pipNameHandler,
        ]);

        return redirect()->back()->with('success', 'Principal Updated Successfully');
    }
}
