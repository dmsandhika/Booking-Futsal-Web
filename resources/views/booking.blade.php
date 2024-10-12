<x-layout>
    <div class="p-6 mt-24">
      <h1 class="text-3xl text-center font-bold mb-4">Form Booking Lapangan Futsal</h1>
  
      <form class="bg-black p-6 rounded-lg shadow-lg">

        <div class="mb-6">
          <h2 class="text-lg font-semibold mb-2 text-gray-200">Pilih Lapangan</h2>
          <div class="flex items-center space-x-6">
            @foreach ($lapangan as $l)
                
            <label class="block">
              <input type="radio" name="lapangan" value="Lapangan A" data-harga="{{ $l->harga }}" class="mr-2 lapangan-radio" onchange="updateTotal()">
              <img src="{{ asset($l->image ) }}" alt="Lapangan A" class="inline-block mb-2 rounded w-auto h-48">
              <span class="block text-center text-gray-300">{{ $l->nama}} - Rp{{ $l->harga }}/Jam</span>
            </label>
            @endforeach
          </div>
        </div>
  
        <div class="mb-6">
          <label class="block text-lg font-semibold mb-2 text-gray-200">Tanggal Booking</label>
          <input type="date" name="tanggal_booking" class=" p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600">
        </div>
  
        <!-- Jam Mulai dan Jam Selesai -->
        <div class="mb-6">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-lg font-semibold mb-2 text-gray-200">Jam Mulai</label>
              <select name="jam_mulai" class="w-full p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" onchange="updateTotal()">
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
              </select>
            </div>
            <div>
              <label class="block text-lg font-semibold mb-2 text-gray-200">Jam Selesai</label>
              <select name="jam_selesai" class="w-full p-2 border rounded-md bg-gray-700 text-gray-100 border-gray-600" onchange="updateTotal()">
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
              </select>
            </div>
          </div>
        </div>
  
        <!-- Sewa Properti -->
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
  
        <!-- Form Properti Tambahan (Hidden by default) -->
        <div id="form-properti" class="hidden mb-6">
          <h3 class="text-lg font-semibold mb-2 text-gray-200">Pilih Properti Tambahan</h3>
          <div class="space-y-4 text-gray-300">
            <div>
              <label>
                <input type="checkbox" name="properti[]" data-harga="10000" value="Bola" class="mr-2 properti-checkbox" onchange="updateTotal()">
                Bola Tambahan (Rp10,000)
              </label>
            </div>
            <div>
              <label>
                <input type="checkbox" name="properti[]" data-harga="10000" value="Rompi" class="mr-2 properti-checkbox" onchange="updateTotal()">
                Rompi 10 Set (Rp10,000)
              </label>
            </div>
            <div>
              <label>
                <input type="checkbox" name="properti[]" data-harga="20000" value="Sepatu Futsal" class="mr-2 properti-checkbox" onchange="updateTotal()">
                Sepatu Futsal (Rp20,000)
              </label>
            </div>
          </div>
        </div>
        <div class="mb-6">
          <span class="block text-lg font-semibold text-gray-200">Total Harga: </span>
          <span id="total-harga" class="text-xl text-blue-400">Rp0</span>
        </div>
        <!-- Submit Button -->
        <div>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="handleBooking(event)">
            Booking
          </button>
        </div>
      </form>
    </div>
  
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
      document.getElementById('total-harga').innerText = `Rp${total}`;
    }
      function handleBooking(event) {
        event.preventDefault(); // Prevent form submission
    
        // Get the total price
        const totalPrice = document.getElementById('total-harga').innerText;
    
        // Get lapangan details
        const lapanganSelected = document.querySelector('input[name="lapangan"]:checked');
        const lapanganName = lapanganSelected ? lapanganSelected.getAttribute('data-name') : '';
    
        // Get booking times
        const jamMulai = document.querySelector('select[name="jam_mulai"]').value;
        const jamSelesai = document.querySelector('select[name="jam_selesai"]').value;
    
        // Get properti details if selected
        const propertiRadios = document.querySelector('input[name="sewa_properti"]:checked');
        let propertiNames = [];
        if (propertiRadios && propertiRadios.value === 'Ya') {
          const propertiCheckboxes = document.querySelectorAll('.properti-checkbox:checked');
          propertiCheckboxes.forEach(checkbox => {
            propertiNames.push(checkbox.getAttribute('data-name'));
          });
        }
    
        // Save details to localStorage
        localStorage.setItem('totalPrice', totalPrice);
        localStorage.setItem('lapanganName', lapanganName);
        localStorage.setItem('jamMulai', jamMulai);
        localStorage.setItem('jamSelesai', jamSelesai);
        localStorage.setItem('propertiNames', JSON.stringify(propertiNames));
    
        // Redirect to the payment details page
        window.location.href = '/payment';
      }
    </script>
    
  
</x-layout>