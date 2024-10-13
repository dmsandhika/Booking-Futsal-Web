<x-layout>
  <div class="max-w-3xl mx-auto p-6 mt-12">
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg text-white">
        <h2 class="text-3xl font-bold mb-4 text-center">Pembayaran Berhasil</h2>
        <div class="mt-8 text-center">
            <a 
                href="{{ route('payment.download', $booking->id) }}"
                class="inline-flex items-center px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 font-bold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16v2a4 4 0 004 4h10a4 4 0 004-4v-2M7 10l5 5 5-5M12 15V3"></path>
                </svg>
                Unduh Bukti Pembayaran
            </a>
        </div>
        <div class="mt-8 text-center">
            
            <a href="/" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Kembali Ke Beranda
            </a>
        </div>
    </div>
</div>
</x-layout>