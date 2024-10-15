<x-layout>
  <?=
          $no=1
          ?>
  <div class="relative overflow-x-auto mt-24">
    <h2 class="text-3xl font-bold mb-12 text-center">Cek Jam Booking</h2>
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
    <h2 class="text-2xl font-semibold mb-12 text-center mt-24">Data Booking {{ $thisLap->nama }} Tanggal  {{ Carbon\Carbon::parse($tgl)->translatedFormat('d F Y')}}</h2>
    @if ($booking->isEmpty())
    <h2 class="text-l mb-12 text-center">Belum ada data booking</h2>
    @else
    <table class="w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded mt-12 mx-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Pemesan
                </th>
                <th scope="col" class="px-6 py-3">
                    Jam
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($booking as $b)
            <tr class="bg-gray-800 border-b dark:bg-gray-800 border-gray-700">
                
              <td class="px-6 py-4">
                {{ $no++ }}
              </td>
              <td class="px-6 py-4">
                {{ $b->nama }}
              </td>
              <td class="px-6 py-4">
                {{ Carbon\Carbon::parse($b->jam_mulai)->translatedFormat('H.i') }} - {{ Carbon\Carbon::parse($b->jam_selesai)->translatedFormat('H.i') }}
              </td>
              
            </tr>
              @endforeach
        </tbody>
    </table>
    @endif
  </div>
</x-layout>