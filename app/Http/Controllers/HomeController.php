<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function app()
    {
        return view('layouts/app');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function verify()
    {
        return view('auth/verify');
    }

    public function confirm()
    {
        return view('passwords/confirm');
    }
    public function email()
    {
        return view('passwords/email');
    }
    public function reset()
    {
        return view('passwords/reset');
    }
}
