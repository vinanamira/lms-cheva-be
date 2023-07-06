<?php

namespace App\Http\Controllers;

use App\Models\FileMateri;
use Illuminate\Http\Request;

class FileMateriController extends Controller
{
    // Menampilkan semua data file materi
    public function index()
    {
        $fileMateris = FileMateri::all();
        return response()->json($fileMateris);
    }


    // Menyimpan data file materi baru
    public function store(Request $request)
    {
        $fileMateri = new FileMateri();
        $fileMateri->file_materi = $request->file_materi;
        $fileMateri->deskripsi = $request->deskripsi;
        $fileMateri->created_at = now();
        $fileMateri->save();

        return response()->json(['message' => 'File Materi created successfully']);
    }

    // Menampilkan data file materi berdasarkan ID
    public function show(FileMateri $id)
    {
        $fileMateri = FileMateri::find($id);

        if (!$fileMateri) {
            return response()->json(['message' => 'File Materi not found'], 404);
        }

        return response()->json($fileMateri);
    }


    // Mengupdate data file materi berdasarkan ID
    public function update(Request $request, FileMateri $id)
    {
        $fileMateri = FileMateri::find($id);

        if (!$fileMateri) {
            return response()->json(['message' => 'File Materi not found'], 404);
        }

        $fileMateri->file_materi = $request->file_materi;
        $fileMateri->deskripsi = $request->deskripsi;
        $fileMateri->save();

        return response()->json(['message' => 'File Materi updated successfully']);
    }

    // Menghapus data file materi berdasarkan ID
    public function destroy(FileMateri $id)
    {
        $fileMateri = FileMateri::find($id);

        if (!$fileMateri) {
            return response()->json(['message' => 'File Materi not found'], 404);
        }

        $fileMateri->delete();

        return response()->json(['message' => 'File Materi deleted successfully']);
    }
}
