<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    // Menampilkan semua data tugas
    public function index()
    {
        $tugas = Tugas::all();
        return response()->json($tugas);
    }


    // Menyimpan data tugas baru
    public function store(Request $request)
    {
        $tugas = new Tugas();
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->deskripsi_tugas = $request->deskripsi_tugas;
        $tugas->deadline_tugas = now();
        $tugas->created_at = now();
        $tugas->updated_at = now();
        $tugas->overdue = now();
        $tugas->save();

        return response()->json(['message' => 'Tugas created successfully']);
    }

    // Menampilkan data tugas berdasarkan ID
    public function show(Tugas $id)
    {
        $tugas = Tugas::find($id);

        if (!$tugas) {
            return response()->json(['message' => 'Tugas not found'], 404);
        }

        return response()->json($tugas);
    }


    // Mengupdate data tugas berdasarkan ID
    public function update(Request $request, Tugas $id)
    {
        $tugas = Tugas::find($id);

        if (!$tugas) {
            return response()->json(['message' => 'Tugas not found'], 404);
        }

        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->deskripsi_tugas = $request->deskripsi_tugas;
        $tugas->deadline_tugas = now();
        $tugas->created_at = now();
        $tugas->updated_at = now();
        $tugas->overdue = now();
        $tugas->save();

        return response()->json(['message' => 'Tugas updated successfully']);
    }

    // Menghapus data tugas berdasarkan ID
    public function destroy(Tugas $id)
    {
        $tugas = Tugas::find($id);

        if (!$tugas) {
            return response()->json(['message' => 'Tugas not found'], 404);
        }

        $tugas->delete();

        return response()->json(['message' => 'Tugas deleted successfully']);
    }
}
