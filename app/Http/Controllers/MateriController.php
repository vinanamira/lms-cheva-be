<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    // Menampilkan semua data materi
    public function index()
    {
        $materi = Materi::all();
        return response()->json($materi);
    }

    public function create()
    {
        //
    }

    // Menyimpan data materi baru
    public function store(Request $request)
    {
        $materi = new Materi();
        $materi->nama_materi = $request->nama_materi;
        $materi->deskripsi = $request->deskripsi;
        $materi->created_at = now();
        $materi->save();

        return response()->json(['message' => 'Materi created successfully']);
    }

    // Menampilkan data materi berdasarkan ID
    public function show(Materi $id)
    {
        $materi = Materi::find($id);

        if (!$materi) {
            return response()->json(['message' => 'Materi not found'], 404);
        }

        return response()->json($materi);
    }

    public function edit(Materi $materi)
    {
        //
    }

    // Mengupdate data materi berdasarkan ID
    public function update(Request $request, Materi $id)
    {
        $materi = Materi::find($id);

        if (!$materi) {
            return response()->json(['message' => 'Materi not found'], 404);
        }

        $materi->nama_materi = $request->nama_materi;
        $materi->deskripsi = $request->deskripsi;
        $materi->save();

        return response()->json(['message' => 'Materi updated successfully']);
    }

    // Menghapus data materi berdasarkan ID
    public function destroy(Materi $id)
    {
        $materi = Materi::find($id);

        if (!$materi) {
            return response()->json(['message' => 'Materi not found'], 404);
        }

        $materi->delete();

        return response()->json(['message' => 'Materi deleted successfully']);
    }
}
