<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function viewPivotData()
  {

    $usersData = [];

      $user = User::all();

      foreach ($user as $user) {
        $userData = [
          'username' => $user->username,
          'role' => $user->roles->pluck('name')->toArray(),  
        ];
        $usersData[] = $userData;
      }

      return view('page.role.pivotData', ['usersData' => $usersData]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile')->with('user', $user);
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
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = Auth::user();
        return view('edit_profile')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'username' => 'string|nullable',
          'address' => 'string|nullable',
          'phone_number' => 'numeric|nullable',
          'profile_picture' => 'mimes:jpg,jpeg,png,webp|max:16384|nullable'
        ]);

        $user = auth()->user();
        // dd($request->all());

        if($request->has('profile_picture')) {
          $path = "user/profile_picture";
          File::delete($path . $user->profile_picture);
          
          $posterImage = time() . '.' . $request->profile_picture->extension();
          $request->profile_picture->move(public_path($path), $posterImage);
          
          $user->profile_picture = $posterImage;
      }

        $user->update([
          'username' => $request->input('username'),
          'address' => $request->input('address'),
          'phone_number' => $request->input('phone_number'),
        ]);

        // return back()->with('message', 'Your profile has been completed');
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
        //
    }
}