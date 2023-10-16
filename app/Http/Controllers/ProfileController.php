<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\View
     */
     public function user()
    {
        return $this->belongsTo(User::class, 'id'); // Assuming you have a 'users' table and 'user_id' foreign key in the 'profiles' table.
    }

     public function index()
    {
        // $user_id = Auth::id();

        // $profile = Profile::where('user_id', $user_id)->first();
        $profiles = Profile::with('user')->get();

        return view('page.profile.showProfile', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::with('user')->find($id);

        return view('page.profile.showProfileById', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::with('user')->find($id);
        $roles = Role::all();

        return view('page.profile.editProfileById', ['profile' => $profile, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::with('user')->find($id);

        $request->validate([
            'name' => 'required',
            'role_id' => 'nullable'
        ]);

        $profile->user->name = $request->input('name'); 
        $profile->role_id = $request->input('role_id');

        $profile->user->save();
        $profile->save();

        // dd($request->all());

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        return redirect('/profile');
    }
}
