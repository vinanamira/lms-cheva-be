<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuridController extends Controller
{
    public function index()
    {
        $role_id = Role::where('nama_role', Role::MURID)->first();
        $users = User::where('role_id', $role_id->id)->get();

        return response()->json([
            'message' => 'Murid get all successfully',
            'data' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'divisi_id' => 'required|exists:divisi,id',
            'fullname' => 'required',
            'username' => 'required|unique:user,username',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $roleMuridId = Role::where('nama_role', Role::MURID)->first()->id;
        $userMurid = User::create([
            'role_id' => $roleMuridId,
            'divisi_id' => $request->divisi_id,
            'user_mentor_id' => Auth::user()->id,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Murid created successfully',
            'data' => $userMurid
        ], 201);
    }

    public function show($muridId)
    {
        $role_id = Role::where('nama_role', Role::MURID)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $muridId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Murid not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Show murid successfully',
            'data' => $user
        ]);
    }

    public function edit(Request $request, $muridId)
    {
        $role_id = Role::where('nama_role', Role::MURID)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $muridId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Murid not found'
            ], 404);
        }

        $request->validate([
            'divisi_id' => 'required|exists:divisi,id',
            'fullname' => 'required',
            'username' => 'required|unique:user,username,'.$user->id,
            'email' => 'required|email',
        ]);

        $user->update([
            'divisi_id' => $request->divisi_id,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Murid updated successfully',
            'data' => $user
        ]);
    }

    public function changePassword(Request $request, $muridId)
    {
        $role_id = Role::where('nama_role', Role::MURID)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $muridId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Murid not found'
            ], 404);
        }

        $request->validate([
            'password' => 'required',
        ]);

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'Murid password updated successfully'
        ]);
    }

    public function destroy($muridId)
    {
        $role_id = Role::where('nama_role', Role::MURID)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $muridId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Murid not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'Murid deleted successfully'
        ]);
    }
}
