<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    // Menampilkan semua data file
    public function index()
    {
        $divisis = Divisi::all();
        return response()->json($divisis);
    }


    // Menyimpan data file baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
        ]);

        $divisi = new Divisi();
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->save();

        return response()->json([
            'message' => 'Divisi created successfully',
            "data" => $divisi
        ], 201);
    }

    // Menampilkan data file berdasarkan ID
    public function show(Divisi $id)
    {
        $divisi = Divisi::find($id);

        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }

        return response()->json([
            "message" => "Divisi show successfully",
            "data" => $divisi
        ]);
    }

    // Mengupdate data file berdasarkan ID
    public function update(Request $request, Divisi $id)
    {
        $divisi = Divisi::find($id)->first();

        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }

        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->created_at = now();
        $divisi->updated_at = now();
        $divisi->save();

        return response()->json([
            'message' => 'Divisi updated successfully',
            "data" => $divisi
        ]);
    }

    // Menghapus data file berdasarkan ID
    public function destroy(Divisi $id)
    {
        $divisi = Divisi::find($id)->first();

        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }

        $divisi->delete();

        return response()->json(['message' => 'Divisi deleted successfully']);
        }
}
