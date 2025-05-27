<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class ApiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::get();
        return response()->json([
            'status' => 'success',
            'data' => $guru,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->gender = $request->gender;
        $guru->alamat = $request->alamat;
        $guru->kontak = $request->kontak;
        $guru->email = $request->email;
        $guru->save();
        return response()->json([
            'status' => 'success',
            'data' => $guru,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = Guru::find($id);
        if (!$guru) {
            return response()->json([
                'status' => 'error',
                'message' => 'Guru not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $guru,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::find($id);
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->gender = $request->gender;
        $guru->alamat = $request->alamat;
        $guru->kontak = $request->kontak;
        $guru->email = $request->email;
        $guru->save();
        return response()->json([
            'status' => 'success',
            'data' => $guru,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guru::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'Guru deleted successfully',
        ], 200);
    }
}
