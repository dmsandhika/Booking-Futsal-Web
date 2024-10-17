<?php

namespace App\Http\Controllers\Api;

use App\Models\Properti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertiResource;
use App\Http\Resources\PropertiByIdResource;

class PropertiController extends Controller
{
    /**
     * Get All Properti
     */
    public function index()
    {
        $properti = Properti::all();

        return response()->json([
            'success' => true,
            'data' => PropertiResource::collection($properti),
            'message' => 'Data properti berhasil diambil.'
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
     * Create new Properti
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nama' => 'required',
                'keterangan' => 'nullable',
                'harga' => 'required|integer',               
            ]);
            $properti=Properti::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'harga' => $request->harga
                ]);
            return response()->json([
                'success' => true,
                'data' => new PropertiByIdResource($properti),
                'message' => 'Data properti berhasil disimpan.'
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data properti gagal disimpan.'
            ],500);
        }
    }

    /**
     * Get Properti By Id
     */
    public function show(string $id)
    {
        $properti=Properti::find($id);
        if($properti == null){
            return response()->json([
                'success' => false,
                'data' => null, 
                'message' => 'Data properti tidak ditemukan.'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => new PropertiByIdResource($properti), 
            'message' => 'Data properti berhasil diambil.'
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
     * Update properti by Id
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'nama' => 'required',
                'keterangan' => 'nullable',
                'harga' => 'required|integer',               
            ]);
            $properti=Properti::find($id);
            if($properti == null){
                return response()->json([
                    'success' => false,
                    'data' => null, 
                    'message' => 'Data properti tidak ditemukan.'
                ], 404);
            }
            $properti->update([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'harga' => $request->harga
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data properti berhasil diubah'
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data properti gagal diubah'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properti = Properti::find($id);
        if($properti == null){
            return response()->json([
                'success' => false,
                'data' => null, 
                'message' => 'Data properti tidak ditemukan.'
            ], 404);
        }
        $properti->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data properti berhasil di hapus.'
        ], 200);
    }
}