<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use Illuminate\Http\Request;

class ApiIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industri = Industri::get();
        return response()->json([
            'status' => 'success',
            'data' => $industri,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $industri = new industri();
        $industri->nama = $request->nama;
        $industri->nip = $request->nip;
        $industri->gender = $request->gender;
        $industri->alamat = $request->alamat;
        $industri->kontak = $request->kontak;
        $industri->email = $request->email;
        $industri->save();
        return response()->json([
            'status' => 'success',
            'data' => $industri,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $industri = Industri::find($id);
        if (!$industri) {
            return response()->json([
                'status' => 'error',
                'message' => 'industri not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $industri,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $industri = Industri::find($id);
        $industri->nama = $request->nama;
        $industri->nip = $request->nip;
        $industri->gender = $request->gender;
        $industri->alamat = $request->alamat;
        $industri->kontak = $request->kontak;
        $industri->email = $request->email;
        $industri->save();
        return response()->json([
            'status' => 'success',
            'data' => $industri,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Industri::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'industri deleted successfully',
        ], 200);
    }
}
