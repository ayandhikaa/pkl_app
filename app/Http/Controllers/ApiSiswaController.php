<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ApisiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::get();
        return response()->json([
            'status' => 'success',
            'data' => $siswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new siswa();
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->gender = $request->gender;
        $siswa->alamat = $request->alamat;
        $siswa->kontak = $request->kontak;
        $siswa->email = $request->email;
        $siswa->foto = $request->foto;
        $siswa->status_pkl = $request->status_pkl;
        $siswa->save();
        return response()->json([
            'status' => 'success',
            'data' => $siswa,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return response()->json([
                'status' => 'error',
                'message' => 'siswa not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $siswa,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->gender = $request->gender;
        $siswa->alamat = $request->alamat;
        $siswa->kontak = $request->kontak;
        $siswa->email = $request->email;
        $siswa->foto = $request->foto;
        $siswa->status_pkl = $request->status_pkl;
        $siswa->save();
        return response()->json([
            'status' => 'success',
            'data' => $siswa,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'siswa deleted successfully',
        ], 200);
    }
}
