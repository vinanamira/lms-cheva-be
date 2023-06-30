<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class PengumpulanController extends Controller
{
    // Menampilkan semua data pengumpulan
    public function index()
    {
        $pengumpulans = Pengumpulan::all();
        return response()->json($pengumpulans);
    }

    public function create()
    {
        //
    }

    // Menyimpan data pengumpulan baru
    public function store(Request $request)
    {
        $pengumpulan = new Pengumpulan();
        $pengumpulan->nilai_tugas = $request->nilai_tugas;
        $pengumpulan->created_at = now();
        $pengumpulan->updated_at = now();
        $pengumpulan->save();

        return response()->json(['message' => 'Pengumpulan created successfully']);
    }

    // Menampilkan data pengumpulan berdasarkan ID
    public function show(Pengumpulan $id)
    {
        $pengumpulan = Pengumpulan::find($id);

        if (!$pengumpulan) {
            return response()->json(['message' => 'Pengumpulan not found'], 404);
        }

        return response()->json($pengumpulan);
    }

    public function edit(Pengumpulan $pengumpulan)
    {
        //
    }

    // Mengupdate data pengumpulan berdasarkan ID
    public function update(Request $request, Pengumpulan $id)
    {
        $pengumpulan = Pengumpulan::find($id);

        if (!$pengumpulan) {
            return response()->json(['message' => 'Pengumpulan not found'], 404);
        }

        $pengumpulan->nilai_tugas = $request->nilai_tugas;
        $pengumpulan->updated_at = now();
        $pengumpulan->save();

        return response()->json(['message' => 'Pengumpulan updated successfully']);
    }

    // Menghapus data pengumpulan berdasarkan ID
    public function destroy(Pengumpulan $id)
    {
        $pengumpulan = Pengumpulan::find($id);

        if (!$pengumpulan) {
            return response()->json(['message' => 'Pengumpulan not found'], 404);
        }

        $pengumpulan->delete();

        return response()->json(['message' => 'Pengumpulan deleted successfully']);
    }
}
