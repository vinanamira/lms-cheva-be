<?php

namespace App\Http\Controllers;

use App\Models\Silabus;
use Illuminate\Http\Request;

class SilabusController extends Controller
{
    // Menampilkan semua data silabus
    public function index()
    {
        $silabus = Silabus::all();
        return response()->json($silabus);
    }

    public function create()
    {
        //
    }

    // Menyimpan data silabus baru
    public function store(Request $request)
    {
        $silabus = new Silabus();
        $silabus->nama_silabus = $request->nama_silabus;
        $silabus->save();

        return response()->json(['message' => 'Silabus created successfully']);
    }

    // Menampilkan data silabus berdasarkan ID
    public function show(Silabus $id)
    {
        $silabus = Silabus::find($id);

        if (!$silabus) {
            return response()->json(['message' => 'Silabus not found'], 404);
        }

        return response()->json($silabus);
    }

    public function edit(Silabus $silabus)
    {
        //
    }

    // Mengupdate data silabus berdasarkan ID
    public function update(Request $request, Silabus $id)
    {
        $silabus = Silabus::find($id);

        if (!$silabus) {
            return response()->json(['message' => 'Silabus not found'], 404);
        }

        $silabus->nama_silabus = $request->nama_silabus;
        $silabus->save();

        return response()->json(['message' => 'Silabus updated successfully']);
    }

    // Menghapus data silabus berdasarkan ID
    public function destroy(Silabus $id)
    {
        $silabus = Silabus::find($id);

        if (!$silabus) {
            return response()->json(['message' => 'Silabus not found'], 404);
        }

        $silabus->delete();

        return response()->json(['message' => 'Silabus deleted successfully']);
    }
}
