<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Resources\FaqResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaqByIdResource;

class FaqController extends Controller
{
    /**
     * Get All Controller
     */
    public function index()
    {
        $faq = Faq::all();

        return response()->json([
            'success' => true,
            'data' => FaqResource::collection($faq),
            'message' => 'Data faq berhasil diambil.'
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
     * Create New Faq
     */
    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'pertanyaan' => 'required',
                'jawaban' => 'required',
            ]);
            $faq=Faq::create([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban
            ]);
            return response()->json([
                'success' => true,
                'data' => new FaqByIdResource($faq),
                'message' => 'Data faq berhasil disimpan.'
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data faq gagal disimpan.'
            ],500);
        }
    }

    /**
     * Get Faq By Id
     */
    public function show(string $id)
    {
        $faq=Faq::find($id);
        if($faq == null){
            return response()->json([
                'success' => false,
                'data' => null, 
                'message' => 'Data faq tidak ditemukan.'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => new FaqByIdResource($faq), 
            'message' => 'Data faq berhasil diambil.'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update Faq By Id
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'pertanyaan' => 'required',
                'jawaban' => 'required',
            ]);
            $faq=Faq::find($id);
            if($faq == null){
                return response()->json([
                    'success' => false,
                    'data' => null, 
                    'message' => 'Data faq tidak ditemukan.'
                ], 404);
            }
            $faq->update([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data faq berhasil diubah'
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data faq gagal diubah.'
            ],500);
        }
    }

    /**
     * Delete FAQ By Id
     */
    public function destroy(string $id)
    {
        $faq = Faq::find($id);
        if($faq == null){
            return response()->json([
                'success' => false,
                'data' => null, 
                'message' => 'Data faq tidak ditemukan.'
            ], 404);
        }
        $faq->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data faq berhasil di hapus.'
        ], 200);
    }
}