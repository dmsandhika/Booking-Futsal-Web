<x-layout>
  <div class="max-w-3xl mx-auto p-6 mt-24">    
        <h2 class="text-3xl font-bold mb-4 text-center">Cek Jam Booking</h2>
        <div class="flex justify-center">
          <form action="{{ route('booking.cek') }}" method="GET">
            <div class="flex items-center">
              <input type="date" name="tgl" class="w-full p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" required>
              <select class="select mx-10 py-2 px-4" name="lap">
                @foreach ($lapangan as $l )
                <option value="{{ $l->id }}">{{ $l->nama }}</option>
                @endforeach
              </select>
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-5">
                Cari
              </button>
            </div>
          </form>
        </div>
        

  </div>
</x-layout>