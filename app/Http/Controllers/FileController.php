<?php

namespace App\Http\Controllers;

use App\Models\file;
use Illuminate\Http\Request;

class FileController extends Controller
{
    // Menampilkan semua data file
    public function index()
    {
        $files = File::all();
        return response()->json([
            "message" => "get all file successfully",
            "data" => $files
        ]);
    }


    // Menyimpan data file baru
    public function store(Request $request)
    {
        $file = new File();
        $file->file = $request->file;
        $file->created_at = now();
        $file->updated_at = now();
        $file->save();

        return response()->json([
            'message' => 'File created successfully',
            'data' => $file
        ]);
    }

    // Menampilkan data file berdasarkan ID
    public function show(file $id)
    {
        $file = File::find($id);

        if (!$file) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return response()->json([
            'message' => 'File show successfully',
            'data' => $file
        ]);
    }


    // Mengupdate data file berdasarkan ID
    public function update(Request $request, file $id)
    {
        $file = File::find($id);

        if (!$file) {
            return response()->json(['message' => 'File not found'], 404);
        }

        $file->file = $request->file;
        $file->updated_at = now();
        $file->save();

        return response()->json([
            'message' => 'File updated successfully',
            'data' => $file
        ]);
    }

    // Menghapus data file berdasarkan ID
    public function destroy(file $id)
    {
        $file = File::find($id);

        if (!$file) {
            return response()->json(['message' => 'File not found'], 404);
        }

        $file->delete();

        return response()->json(['message' => 'File deleted successfully']);
    }
}
