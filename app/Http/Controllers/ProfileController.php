<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index() {
        $edit = 'Halaman Edit Profile';
        return view('profile')->with('halaman_edit', $edit);
    }
    function tentang() {

    }
}
