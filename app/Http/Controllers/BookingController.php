<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\Properti;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapangan = Lapangan::all();
        $properti = Properti::all();
        return view('booking', compact('lapangan', 'properti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nama' => 'required',
                'lapangan' =>'required',
                'tanggal_booking' => 'required',
                'jam_mulai' =>'required',
                'jam_selesai' => 'required',
                'properti' => 'nullable',
                'total_harga' => 'required'                 
            ]);
            $booking=Booking::create([
                'nama' => $request->nama,
                'lapangan' => $request->lapangan,
                'tanggal_booking' => $request->tanggal_booking,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'properti' => $request->has('properti') ? implode(', ', $request->properti) : null,
                'total_harga' => $request->total_harga
            ]);
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $request->total_harga,
                )
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $booking->snap_token = $snapToken;
            $booking->save();
            return redirect()->route('payment.show', $booking->id);
        } catch(\Exception $e){
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id); 
        return view('payment', compact('booking')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function success(Booking $booking){
        $booking->status = 'paid';
        $booking->save();
        return view('success');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}