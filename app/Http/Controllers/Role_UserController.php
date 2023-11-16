<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class Role_UserController extends Controller
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

      return response()->json(['data' => $usersData]);
  }
}
