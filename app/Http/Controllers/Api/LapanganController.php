<?php

namespace App\Http\Controllers\Api;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\LapanganResource;
use App\Http\Resources\LapanganByIdResource;

class LapanganController extends Controller
{
    /**
     * Get All Lapangan
     */
    public function index()
    {
        $lapangan=Lapangan::all();
        return response()->json([
            'success' => true,
            'data' => LapanganResource::collection($lapangan), 
            'message' => 'Data lapangan berhasil diambil.'
        ], 200); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Create Lapangan
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nama' => 'required',
                'harga' => 'required|integer',
                'keterangan' => 'nullable',
                'image' => 'required',               
            ]);
            $lapangan=Lapangan::create([
                'nama' => $request->nama,
                'image' => $request->image,
                'keterangan' => $request->keterangan,
                'harga' => $request->harga
                ]);
            return response()->json([
                'success' => true,
                'data' => new LapanganByIdResource($lapangan), 
                'message' => 'Data lapangan berhasil disimpan.'
            ], 200);
        } catch(\Exception $e){
            
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => $e->getMessage()
            ], 500);
            }
    }

    /**
     *Get Lapangan By Id
     */
    public function show(string $id)
    {
        $lapangan=Lapangan::find($id);
        if($lapangan == null){
            return response()->json([
                'success' => false,
                'data' => null, 
                'message' => 'Data lapangan tidak ditemukan.'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => new LapanganByIdResource($lapangan), 
            'message' => 'Data lapangan berhasil diambil.'
        ], 200);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update Lapangan By Id
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'nama' => 'required',
                'harga' => 'required|integer',
                'keterangan' => 'nullable',
                'image' => 'required',               
            ]);
            $lapangan=Lapangan::find($id);
            if($lapangan == null){
                return response()->json([
                    'success' => false,
                    'data' => null, 
                    'message' => 'Data lapangan tidak ditemukan.'
                ], 404);
            }
            $lapangan->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'image' => $request->image,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data lapangan berhasil diubah.'
            ], 200);

            
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ],400);
            
        }
    }

    /**
     * Delete Lapangan By Id
     */
    public function destroy(string $id)
    {
        $lapangan=Lapangan::find($id);
        if($lapangan == null){
            return response()->json([
                'success' => false,
                'data' => null, 
                'message' => 'Data lapangan tidak ditemukan.'
            ], 404);
        }
        $lapangan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data lapangan berhasil di hapus.'
        ], 200);
    }
}