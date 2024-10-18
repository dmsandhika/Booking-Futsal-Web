<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Hidehalo\Nanoid\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Resources\BookingByIdResource;

class BookingController extends Controller
{
    /**
     * Get All Booking
     */
    public function index()
    {
        try {
            $booking = Booking::all();
            return response()->json([
                'success' => true,
                'data' => BookingResource::collection($booking),
                'message' => 'Data booking berhasil diambil.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Create a new booking
     */
    public function store(Request $request)
    {
        try {
         $request->validate([
                'nama' => 'required',
                'id_lapangan' =>'required|integer',
                'tanggal_booking' => 'required|date',
                'jam_mulai' =>'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
                'properti' => 'nullable',
                'total_harga' => 'required',                
                'dibayar' => 'required',
                'jenis_pembayaran' => 'required'
            ]);

            $existingBooking = Booking::where('id_lapangan', $request->id_lapangan)
                ->where('tanggal_booking', $request->tanggal_booking)
                ->where(function($query) use ($request){
                    $query->whereBetween('jam_mulai', [$request->jam_mulai,$request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai,$request->jam_selesai]);
                })
                ->exists();

            if ($existingBooking) {
                return response() -> json([
                    'success' => false,
                    'message' => 'Lapangan ini sudah dibooking pada waktu tersebut.'
                ], 400);
            }
            $id_pembayaran = 'FTSL' . str_pad(random_int(1, 9999999999), 10, '0', STR_PAD_LEFT);

            $booking = Booking::create([
                'id_pembayaran' => $id_pembayaran,
                'nama' => $request->nama,
                'id_lapangan' => $request->id_lapangan,
                'tanggal_booking' => $request->tanggal_booking,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'properti' => $request->has('properti') ? implode(', ', $request->properti) : null,
                'total_harga' => $request->total_harga,
                'dibayar' => $request->dibayar,
                'jenis_pembayaran' => $request->jenis_pembayaran
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data booking berhasil ditambahkan.'
            ],200);

        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menambahkan data booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get Booking By Id
     */
    public function show(string $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Data booking tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new BookingByIdResource($booking),
            'message' => 'Data booking berhasil diambil.'
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
     * Update Booking By Id
     */
    public function update(Request $request, string $id)
    {
        
        try{
            $request->validate([
                'nama' => 'required',
                'id_lapangan' =>'required|integer',
                'tanggal_booking' => 'required|date',
                'jam_mulai' =>'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
                'properti' => 'nullable',
                'total_harga' => 'required',                
                'dibayar' => 'required',
                'jenis_pembayaran' => 'required'
            ]);

            $existingBooking = Booking::where('id_lapangan', $request->id_lapangan)
                ->where('tanggal_booking', $request->tanggal_booking)
                ->where(function($query) use ($request){
                    $query->whereBetween('jam_mulai', [$request->jam_mulai,$request->jam_selesai])
                    ->orWhereBetween('jam_selesai', [$request->jam_mulai,$request->jam_selesai]);
                })
                ->exists();

            if ($existingBooking) {
                return response() -> json([
                    'success' => false,
                    'message' => 'Lapangan ini sudah dibooking pada waktu tersebut.'
                ], 400);
            }
            $booking = Booking::find($id);
            $booking->update([
                'nama' => $request->nama,
                'id_lapangan' => $request->id_lapangan,
                'tanggal_booking' => $request->tanggal_booking,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'properti' => $request->has('properti') ? implode(', ', $request->properti) : null,
                'total_harga' => $request->total_harga,
                'dibayar' => $request->dibayar,
                'jenis_pembayaran' => $request->jenis_pembayaran
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data booking berhasil diubah.'
            ], 200);

        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah data booking: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete Booking
     */
    public function destroy(string $id)
    {
        $booking=Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Data booking tidak ditemukan.'
            ], 404);
        }

        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data booking berhasil di hapus.'
        ], 200);
    }
}