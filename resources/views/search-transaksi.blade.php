<x-layout>

  <div class="p-6 mt-24 min-h-full">
    <h1 class="text-3xl text-center font-bold mb-4">Cari Riwayat Transaksi</h1>

    <div class="flex justify-center">
      <form action="{{ route('booking.search') }}" method="GET">
        <div class="flex items-center">
          <span class="p-2 border rounded-md bg-gray-700 border-gray-600">#
            </span>
          <input type="text" name="search" class="w-full p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" placeholder="Masukkan ID Registrasi">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-5">
            Cari
          </button>
        </div>
      </form>
    </div>
    



  </div>
</x-layout>