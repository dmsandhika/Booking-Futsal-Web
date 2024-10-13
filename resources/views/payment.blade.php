<x-layout>
  <div class="max-w-3xl mx-auto p-6 mt-12">
      <div class="bg-gray-800 p-8 rounded-lg shadow-lg text-white">
          <h2 class="text-3xl font-bold mb-4 text-center">Detail Booking Anda</h2>


          <div class="space-y-4">
              <div class="flex justify-between">
                  <span class="font-semibold">ID Pembayaran:</span>
                  <span id="id">#{{$booking->id_pembayaran }}
                  </span>
              </div>
              <div class="flex justify-between">
                  <span class="font-semibold">Nama:</span>
                  <span>{{$booking->nama }}</span>
              </div>
              <div class="flex justify-between">
                  <span class="font-semibold">Lapangan:</span>
                  <span>{{$booking->lapangan }}</span>
              </div>
              <div class="flex justify-between">
                  <span class="font-semibold">Tanggal Booking:</span>
                  <span>{{Carbon\Carbon::parse($booking->tanggal_booking)->translatedFormat('d F Y');}}</span>
              </div>
              <div class="flex justify-between">
                  <span class="font-semibold">Jam Mulai:</span>
                  <span>{{$booking->jam_mulai }}</span>
              </div>
              <div class="flex justify-between">
                  <span class="font-semibold">Jam Selesai:</span>
                  <span>{{$booking->jam_selesai }}</span>
              </div>
              @if($booking->properti)
              <div class="flex justify-between">
                  <span class="font-semibold">Properti Tambahan:</span>
                  <span>{{$booking->properti }}</span>
              </div>
              @endif
              <div class="flex justify-between  text-lg font-bold">
                  <span>Total Harga:</span>
                  <span>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</span>
              </div>
              <div class="flex justify-between text-blue-400 text-lg font-bold">
                  <span>Jumlah yang Harus Dibayar:</span>
                  <span>Rp {{ number_format($booking->dibayar, 0, ',', '.') }}</span>
              </div>
          </div>
         

          <!-- Tombol Pembayaran -->
          <div class="mt-8 text-center">
              <button id="pay-button" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                  Lanjutkan ke Pembayaran
              </button>
          </div>
      </div>
  </div>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}>"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
    // SnapToken acquired from previous step
    snap.pay(`{{$booking->snap_token }}`, {
      // Optional
      onSuccess: function(result){
        window.location.href = `{{ route('payment.success', ['id' => $booking->id]) }}`;
      },
      // Optional
      onPending: function(result){
        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
      },
      // Optional
      onError: function(result){
        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
      }
    });
  };

  
</script>
</x-layout>
