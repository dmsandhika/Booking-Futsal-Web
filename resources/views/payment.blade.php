<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rincian Pembayaran</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Rincian Pembayaran</h1>
    
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
      <p class="text-xl mb-4"><strong>Lapangan:</strong> <span id="lapangan-name"></span></p>
      <p class="text-xl mb-4"><strong>Jam Sewa:</strong> <span id="jam-sewa"></span></p>
      <p class="text-xl mb-4"><strong>Sewa Properti:</strong> <span id="sewa-properti"></span></p>
      <p class="text-2xl font-bold mb-6"><strong>Total Pembayaran:</strong> <span id="total-harga"></span></p>

      <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Lanjutkan Pembayaran
      </a>
    </div>
  </div>

  <script>
    // Retrieve booking details from localStorage
    const lapanganName = localStorage.getItem('lapanganName');
    const jamMulai = localStorage.getItem('jamMulai');
    const jamSelesai = localStorage.getItem('jamSelesai');
    const propertiNames = JSON.parse(localStorage.getItem('propertiNames'));
    const totalPrice = localStorage.getItem('totalPrice');

    // Display booking details
    document.getElementById('lapangan-name').innerText = lapanganName || 'Tidak Dipilih';
    document.getElementById('jam-sewa').innerText = `${jamMulai} - ${jamSelesai}`;
    
    if (propertiNames.length > 0) {
      document.getElementById('sewa-properti').innerText = propertiNames.join(', ');
    } else {
      document.getElementById('sewa-properti').innerText = 'Tidak ada properti disewa';
    }

    document.getElementById('total-harga').innerText = totalPrice || 'Rp0';
  </script>
</body>
</html>
