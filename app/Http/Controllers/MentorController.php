<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        $role_id = Role::where('nama_role', Role::MENTOR)->first();
        $users = User::where('role_id', $role_id->id)->get();

        return response()->json([
            'message' => 'Mentor get all successfully',
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

        $roleMentorId = Role::where('nama_role', Role::MENTOR)->first()->id;
        $userMentor = User::create([
            'role_id' => $roleMentorId,
            'divisi_id' => $request->divisi_id,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Mentor created successfully',
            'data' => $userMentor
        ], 201);
    }

    public function show($mentorId)
    {
        $role_id = Role::where('nama_role', Role::MENTOR)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $mentorId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Mentor not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Show mentor successfully',
            'data' => $user
        ]);
    }

    public function edit(Request $request, $mentorId)
    {
        $role_id = Role::where('nama_role', Role::MENTOR)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $mentorId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Mentor not found'
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
            'message' => 'Mentor updated successfully',
            'data' => $user
        ]);
    }

    public function changePassword(Request $request, $mentorId)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $role_id = Role::where('nama_role', Role::MENTOR)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $mentorId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Mentor not found'
            ], 404);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'Mentor password updated successfully'
        ]);
    }

    public function destroy($mentorId)
    {
        $role_id = Role::where('nama_role', Role::MENTOR)->first();
        $user = User::where('role_id', $role_id->id)->where('id', $mentorId)->first();

        if(!$user){
            return response()->json([
                'message' => 'Mentor not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'Mentor deleted successfully'
        ]);
    }
}
