<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['role'] = Role::all();

    if (count($data['role']) === 0) {
      return response()->json([
        'response_code' => '01',
        'response_message' => 'Gagal menampilkan data role, tidak ada data role untuk ditampilkan',
      ], 200);
    }
    return response()->json([
      'response_code' => '00',
      'response_message' => 'tampil data role berhasil',
      'data' =>  $data,
    ], 200);
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
    $request->validate([
      'name' => 'required',
      'description' => 'required',
    ]);

    $role = new Role;

    $role->name = $request->input('name');
    $role->description = $request->input('description');

    $role->save();

    return response()->json([
      'response_code' => '00',
      'response_message' => 'Tambah Role berhasil',
    ], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $role = Role::find($id);

    if (!$role) {
      return response()->json([
        'response_code' => '01',
        'response_message' => 'Detail Data Role Dengan ID tersebut tidak ditemukan',
      ], 404);
    }

    return response()->json([
      'response_code' => '00',
      'response_message' => 'Detail Data Role',
      'data' => $role,
    ], 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    $request->validate([
      'name' => 'required',
    ]);

    $role = Role::find($id);

    if (!$role) {
      return response()->json([
        'response_code' => '01',
        'response_message' => 'Detail Data Role Dengan ID Tersebut Tidak Ditemukan',
      ], 404);
    }

    $role->name = $request->input('name');

    $role->save();

    return response()->json([
      'response_code' => '00',
      'response_message' => 'Update role berhasil'
    ], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $role = Role::find($id);

    if (!$role) {
      return response()->json([
        'response_code' => '01',
        'response_message' => 'Detail Data Role Dengan ID Tersebut Tidak Ditemukan',
      ], 404);
    }

    $role->delete();

    return response()->json([
      'response_code' => '00',
      'response_message' => 'Berhasil menghapus role'
    ], 200);
  }
}
