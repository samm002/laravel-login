<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class Role_UserController extends Controller
{
  public function showUsersForRole(Role $role)
  {
      $users = $role->users;
      
      return view('users_for_role', compact('role', 'users'));
  }
}
