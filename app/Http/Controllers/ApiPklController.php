<?php

namespace App\Http\Controllers;

use App\Models\Pkl;
use Illuminate\Http\Request;

class ApipklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pkl = Pkl::get();
        return response()->json([
            'status' => 'success',
            'data' => $pkl,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pkl = new pkl();
        $pkl->mulai = $request->mulai;
        $pkl->selesai = $request->selesai;
        $pkl->siswa_id = $request->siswa_id;
        $pkl->guru_id = $request->guru_id;
        $pkl->industri_id = $request->industri_id;
        $pkl->save();
        return response()->json([
            'status' => 'success',
            'data' => $pkl,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pkl = Pkl::find($id);
        if (!$pkl) {
            return response()->json([
                'status' => 'error',
                'message' => 'pkl not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $pkl,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pkl = Pkl::find($id);
        $pkl->muali = $request->mulai;
        $pkl->selesai = $request->selesai;
        $pkl->siswa_id = $request->siswa_id;
        $pkl->guru_id = $request->guru_id;
        $pkl->industri_id = $request->industri_id;
        $pkl->save();
        return response()->json([
            'status' => 'success',
            'data' => $pkl,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pkl::destroy($id);
        return response()->json([
            'status' => 'success',
            'message' => 'pkl deleted successfully',
        ], 200);
    }
}
