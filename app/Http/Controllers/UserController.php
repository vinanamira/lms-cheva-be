<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua data user
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


    // Menyimpan data user baru
    public function store(Request $request)
    {
        $user = new User();
        $user->photo_profile = $request->photo_profile;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        return response()->json(['message' => 'User created successfully']);
    }

    // Menampilkan data user berdasarkan ID
    public function show(User $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
    

    // Mengupdate data user berdasarkan ID
    public function update(Request $request, User $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->photo_profile = $request->photo_profile;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        return response()->json(['message' => 'User created successfully']);
    }

    // Menghapus data user berdasarkan ID
    public function destroy(User $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
