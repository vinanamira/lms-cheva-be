<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    // Menampilkan semua data tugas
    public function index()
    {
        $tugas = Tugas::all();
        return response()->json([
            'message' => 'Tugas get all successfully',
            'data' => $tugas
        ]);
    }


    // Menyimpan data tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'silabus_id' => 'required|exists:silabus,id',
            'nama_tugas' => 'required',
            'deskripsi_tugas' => 'required',
            'deadline_tugas' => 'required|date_format:d-m-Y',
            'overdue' => 'required|date_format:d-m-Y'
        ]);

        $tugas = new Tugas();
        $tugas->silabus_id = $request->silabus_id;
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->deskripsi_tugas = $request->deskripsi_tugas;
        $tugas->deadline_tugas = Carbon::createFromFormat('d-m-Y', $request->deadline_tugas);
        $tugas->overdue = Carbon::createFromFormat('d-m-Y', $request->overdue);
        $tugas->save();

        return response()->json([
            'message' => 'Tugas created successfully',
            'data' => $tugas
        ]);
    }

    // Menampilkan data tugas berdasarkan ID
    public function show(Tugas $id)
    {
        $tugas = Tugas::find($id)->first();

        if (!$tugas) {
            return response()->json(['message' => 'Tugas not found'], 404);
        }

        return response()->json([
            'message' => 'Tugas get data by id successfully',
            'data' => $tugas
        ]);
    }


    // Mengupdate data tugas berdasarkan ID
    public function update(Request $request, Tugas $id)
    {
        
        $tugas = Tugas::find($id)->first();

        if (!$tugas) {
            return response()->json(['message' => 'Tugas not found'], 404);
        }

        $request->validate([
            'silabus_id' => 'required|exists:silabus,id',
            'nama_tugas' => 'required',
            'deskripsi_tugas' => 'required',
            'deadline_tugas' => 'required|date_format:d-m-Y',
            'overdue' => 'required|date_format:d-m-Y'
        ]);

        $tugas->silabus_id = $request->silabus_id;
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->deskripsi_tugas = $request->deskripsi_tugas;
        $tugas->deadline_tugas = Carbon::createFromFormat('d-m-Y', $request->deadline_tugas);
        $tugas->overdue = Carbon::createFromFormat('d-m-Y', $request->overdue);
        $tugas->save();

        return response()->json([
            'message' => 'Tugas updated successfully',
            'data' => $tugas
        ]);
    }

    // Menghapus data tugas berdasarkan ID
    public function destroy(Tugas $id)
    {
        $tugas = Tugas::find($id)->first();

        if (!$tugas) {
            return response()->json(['message' => 'Tugas not found'], 404);
        }

        $tugas->delete();

        return response()->json(['message' => 'Tugas deleted successfully']);
    }
}
