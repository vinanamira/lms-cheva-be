<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisis = Divisi::all();
        return response()->json($divisis);
    }

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $divisi = new Divisi();
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->created_at = now();
        $divisi->updated_at = now();
        $divisi->save();

    return response()->json(['message' => 'Divisi created successfully']);
    }
 
    public function show(Divisi $id)
    {
        $divisi = Divisi::find($id);

        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }

    return response()->json($divisi);
    }
  
    public function edit(Divisi $divisi)
    {
        //
    }

    public function update(Request $request, Divisi $id)
    {
        $divisi = Divisi::find($id);

        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }

        $divisi = new Divisi();
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->created_at = now();
        $divisi->updated_at = now();
        $divisi->save();

        return response()->json(['message' => 'Divisi updated successfully']);
    }

    
    public function destroy(Divisi $id)
    {
        $divisi = Divisi::find($id);

        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }

        $divisi->delete();

        return response()->json(['message' => 'Divisi deleted successfully']);
        }
}
