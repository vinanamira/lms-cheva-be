<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Menampilkan semua data role
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function create()
    {
        //
    }

    // Menyimpan data role baru
    public function store(Request $request)
    {
        $role = new Role();
        $role->nama_role = $request->nama_role;
        $role->save();

        return response()->json(['message' => 'Role created successfully']);
    }

    // Menampilkan data role berdasarkan ID
    public function show(Role $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        return response()->json($role);
    }

    public function edit(Role $role)
    {
        //
    }

    // Mengupdate data role berdasarkan ID
    public function update(Request $request, Role $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $role->nama_role = $request->nama_role;
        $role->save();

        return response()->json(['message' => 'Role updated successfully']);
    }

    // Menghapus data role berdasarkan ID
    public function destroy(Role $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'Role deleted successfully']);
    }
}
