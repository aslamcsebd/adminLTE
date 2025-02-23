<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        if (Auth::check()) {
            return redirect()->route(Auth::user()->role . '.home');
        }
        return redirect()->route('login');
    }

    public function adminHome()
    {
        $data['types'] = [
            [
                'link'  => url('title-1'),
                'value' => User::count(),
                'title' => 'Admin title 1'
            ],
            [
                'link'  => route('auth'),
                'value' => User::count(),
                'title' => 'Admin title 2'
            ],
            [
                'link'  => url('title-3'),
                'value' => User::count(),
                'title' => 'Admin title 3'
            ],
        ];

        return view('admin.home', $data);
    }

    public function managerHome()
    {
        $data['types'] = [
            [
                'link'  => url('title-1'),
                'value' => User::count(),
                'title' => 'Manager title 1'
            ],
            [
                'link'  => route('auth'),
                'value' => User::count(),
                'title' => 'Manager title 2'
            ],
            [
                'link'  => url('title-3'),
                'value' => User::count(),
                'title' => 'Manager title 3'
            ],
        ];

        return view('manager.home', $data);
    }

    public function userHome()
    {
        $data['types'] = [
            [
                'link'  => url('title-1'),
                'value' => User::count(),
                'title' => 'User title 1'
            ],
            [
                'link'  => route('auth'),
                'value' => User::count(),
                'title' => 'User title 2'
            ],
            [
                'link'  => url('title-3'),
                'value' => User::count(),
                'title' => 'User title 3'
            ],
        ];

        return view('user.home', $data);
    }

    public function auth()
    {
        return view('loginForm.auth');
    }
}