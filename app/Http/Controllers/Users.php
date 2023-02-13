<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Users extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return json_encode(['data' => User::all()]);
    }

    public function showUsers()
    {

        $titles = [
            'username',
            'name',
            'email',
            'mobile',
        ];

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('content.dashboard.users.list', compact('titles'));
    }
}
