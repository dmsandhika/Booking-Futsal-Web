<x-layout>
    <div class="p-6 mt-24">
      <h1 class="text-3xl text-center font-bold mb-4">Form Booking Lapangan Futsal</h1>
  
      <form class="bg-black p-6 rounded-lg shadow-lg" id="myForm" action={{ route('booking.store') }} method="POST">
        @csrf
        <div class="mb-6">
          <label class="block text-lg font-semibold mb-2 text-gray-200">Nama Pemesan</label>
          <input type="text" name="nama" class="w-full p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" required>
        </div>
        <div class="mb-6">
          <h2 class="text-lg font-semibold mb-2 text-gray-200">Pilih Lapangan</h2>
          <div class="flex items-center space-x-6">
            @foreach ($lapangan as $l)
                
            <label class="block">
              <input type="radio" name="lapangan" value="{{ $l->id}}" data-harga="{{ $l->harga }}" class="mr-2 lapangan-radio" onchange="updateTotal()">
              <img src="{{Storage::url($l->image) }}" alt="Lapangan A" class="inline-block mb-2 rounded w-auto  h-48 ">
              <span class="block text-center text-gray-300">{{ $l->nama}} - Rp{{ $l->harga }}/Jam</span>
            </label>
            @endforeach
          </div>
        </div>
  
        <div class="mb-6">
          <label class="block text-lg font-semibold mb-2 text-gray-200">Tanggal Booking</label>
          <input type="date" name="tanggal_booking" class=" p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" required>
        </div>
        <div class="mb-6">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-lg font-semibold mb-2 text-gray-200">Jam Mulai</label>
              <select name="jam_mulai" class="w-full p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" onchange="updateTotal()">
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
              </select>
            </div>
            <div>
              <label class="block text-lg font-semibold mb-2 text-gray-200">Jam Selesai</label>
              <select name="jam_selesai" class="w-full p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" onchange="updateTotal()">
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
                <option value="23:00">23:00</option>
              </select>
            </div>
          </div>
        </div>

        <div class="mb-6">
          <label class="block text-lg font-semibold mb-2 text-gray-200">Sewa Properti Tambahan?</label>
          <div class="flex items-center space-x-6 text-gray-300">
            <label>
              <input type="radio" name="sewa_properti" value="Ya" class="mr-2" onchange="toggleProperti(true); updateTotal();">
              Ya
            </label>
            <label>
              <input type="radio" name="sewa_properti" value="Tidak" class="mr-2" onchange="toggleProperti(false); updateTotal();">
              Tidak
            </label>
          </div>
        </div>
  
        <div id="form-properti" class="hidden mb-6">
          <h3 class="text-lg font-semibold mb-2 text-gray-200">Pilih Properti Tambahan</h3>
          <div class="space-y-4 text-gray-300">
            @foreach ($properti as $p )
              
            <div>
              <label>
                <input type="checkbox" name="properti[]" data-harga="{{ $p->harga }}" value="{{$p->nama}}" class="mr-2 properti-checkbox" onchange="updateTotal()">
                {{ $p->nama}} (Rp{{ $p->harga }})
              </label>
            </div>
            @endforeach
          </div>
        </div>
        <div class="mb-6">
          <label class="block text-lg font-semibold mb-2 text-gray-200">Pembayaran</label>
          <div class="flex items-center space-x-6 text-gray-300">
            <label>
              <input type="radio" name="jenis_pembayaran" value="DP" class="mr-2" onchange="updateTotal();">
              DP 50%
            </label>
            <label>
              <input type="radio" name="jenis_pembayaran" value="Lunas" class="mr-2" onchange="updateTotal();">
              Lunas
            </label>
          </div>
        </div>
        <div class="mb-6">
          <p class="block text-lg font-semibold text-gray-200">Total Harga: <span id="total-harga">Rp0</span></p>
          <span class="block text-lg font-semibold text-gray-200">Jumlah yang Harus Dibayar: </span>
          <span id="harus-dibayar" class="text-xl text-blue-400">Rp0</span>
        </div>
        <input type="hidden" name="total_harga" id="total-harga-input">
        <input type="hidden" name="dibayar" id="harus-dibayar-input">

        <div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >
            Booking
          </button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          @if ($errors->any())
              Swal.fire({
                  title: 'Error!',
                  text: '{{ $errors->first() }}', 
                  icon: 'error',
                  showConfirmButton: false,
                  timer: 5000, 
                timerProgressBar: true,
              });
          @endif
      });
  </script>
    <script>

      function toggleProperti(show) {
        const formProperti = document.getElementById('form-properti');
        if (show) {
          formProperti.classList.remove('hidden');
        } else {
          formProperti.classList.add('hidden');
        }
      }

      function updateTotal() {
        let total = 0;
        let harus_dibayar = 0;

        const lapanganSelected = document.querySelector('input[name="lapangan"]:checked');
        if (lapanganSelected) {
          const jamMulai = document.querySelector('select[name="jam_mulai"]').value;
          const jamSelesai = document.querySelector('select[name="jam_selesai"]').value;
          const startTime = new Date(`2023-01-01T${jamMulai}:00`);
          const endTime = new Date(`2023-01-01T${jamSelesai}:00`);
          const hours = (endTime - startTime) / (1000 * 60 * 60); 
          
          total += parseInt(lapanganSelected.getAttribute('data-harga')) * hours;
        }

        const propertiRadios = document.querySelector('input[name="sewa_properti"]:checked');
        if (propertiRadios && propertiRadios.value === 'Ya') {
          const propertiCheckboxes = document.querySelectorAll('.properti-checkbox:checked');
          propertiCheckboxes.forEach(checkbox => {
            total += parseInt(checkbox.getAttribute('data-harga'));
          });
        }

        const jenisPembayaran = document.querySelector('input[name="jenis_pembayaran"]:checked');
        if (jenisPembayaran) {
          if (jenisPembayaran.value === 'DP') {
            harus_dibayar = total / 2; 
          } else if (jenisPembayaran.value === 'Lunas') {
            harus_dibayar = total;  
          }
        }

        document.getElementById('total-harga').innerText = `Rp${total}`;
        document.getElementById('total-harga-input').value = total;
        document.getElementById('harus-dibayar').innerText = `Rp${harus_dibayar}`; 
        document.getElementById('harus-dibayar-input').value = harus_dibayar; 
      }
    </script>
    
  
</x-layout>