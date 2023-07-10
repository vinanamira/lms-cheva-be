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
        return response()->json([
            'message' => 'Materi get all successfully',
            'data' => $materi
        ]);
    }


    // Menyimpan data materi baru
    public function store(Request $request)
    {
        $request->validate([
            'silabus_id' => 'required|exists:silabus,id',
            'nama_materi' => 'required',
        ]);

        $materi = new Materi();
        $materi->nama_materi = $request->nama_materi;
        $materi->silabus_id = $request->silabus_id;
        $materi->deskripsi = $request->deskripsi;
        $materi->created_at = now();
        $materi->save();

        return response()->json([
            'message' => 'Materi created successfully',
            'data' => $materi
        ]);
    }

    // Menampilkan data materi berdasarkan ID
    public function show(Materi $id)
    {
        $materi = Materi::find($id)->first();

        if (!$materi) {
            return response()->json(['message' => 'Materi not found'], 404);
        }

        return response()->json([
            'message' => 'Materi get data by id successfully',
            'data' => $materi
        ]);
    }


    // Mengupdate data materi berdasarkan ID
    public function update(Request $request, Materi $id)
    {
        $request->validate([
            'silabus_id' => 'required|exists:silabus,id',
            'nama_materi' => 'required',
        ]);

        $materi = Materi::find($id)->first();

        if (!$materi) {
            return response()->json(['message' => 'Materi not found'], 404);
        }

        $materi->nama_materi = $request->nama_materi;
        $materi->deskripsi = $request->deskripsi;
        $materi->save();

        return response()->json([
            'message' => 'Materi updated successfully',
            'data' => $materi
        ]);
    }

    // Menghapus data materi berdasarkan ID
    public function destroy(Materi $id)
    {
        $materi = Materi::find($id)->first();

        if (!$materi) {
            return response()->json(['message' => 'Materi not found'], 404);
        }

        $materi->delete();

        return response()->json(['message' => 'Materi deleted successfully']);
    }
}
