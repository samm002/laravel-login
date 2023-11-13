<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class profileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = User::all();
        return view('page.profile.showAllProfile', ['user' => $user]);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('page.profile.profileDetail', ['user' => $user]);
    }
}
