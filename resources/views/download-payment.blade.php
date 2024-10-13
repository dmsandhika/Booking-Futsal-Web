<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    <style>
        body {
            background-color: #f7fafc;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 2rem auto;
            background-color: #ffffff; 
            border-radius: 0.5rem; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            overflow: hidden;
        }
        .header {
            background-color: #3182ce; 
            color: #ffffff; 
            padding: 1.5rem; 
            text-align: center;
        }
        .header h1 {
            font-size: 1.5rem;
            font-weight: bold; 
        }
        .header p {
            margin-top: 0.5rem;
        }
        .content {
            padding: 1.5rem;
        }
        .content div {
            margin-bottom: 1rem;
        }
        .content .label {
            font-weight: bold;
        }
        .content .value {
            margin-left: 0.5rem;
            color: #4a5568;
        }
        .footer {
            background-color: #edf2f7;
            padding: 1.5rem; 
        }
        .footer h2 {
            font-size: 1.125rem; 
            font-weight: bold; 
            margin-bottom: 1rem; 
        }
        .footer ul {
            list-style-type: disc;
            padding-left: 1.25rem; 
            color: #4a5568; 
        }
        .footer ul li {
            margin-bottom: 0.5rem; 
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Bukti Pembayaran My Futsal</h1>
            <p>Terima kasih telah melakukan pembayaran.</p>
        </div>

        <div class="content">
            <div>
                <span class="label">ID Pembayaran:</span>
                <span class="value">#{{$booking->id_pembayaran}}</span>
            </div>
            <div>
                <span class="label">Nama:</span>
                <span class="value">{{$booking->nama}}</span>
            </div>
            <div>
                <span class="label">Tanggal Booking:</span>
                <span class="value">{{ Carbon\Carbon::parse($booking->tanggal_booking)->translatedFormat('d F Y')}}</span>
            </div>
            <div>
                <span class="label">Jam Booking:</span>
                <span class="value">{{ Carbon\Carbon::parse($booking->jam_mulai)->translatedFormat('H.i') }} - {{ Carbon\Carbon::parse($booking->jam_selesai)->translatedFormat('H.i') }}</span>
            </div>
            <div>
                <span class="label">Sewa Properti:</span>
                <span class="value">{{ $booking->properti }}</span>
            </div>
            <div>
                <span class="label">Tipe Pembayaran:</span>
                <span class="value">{{$booking->jenis_pembayaran}}</span>
            </div>
            <div>
                <span class="label">Total Harga:</span>
                <span class="value">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</span>
            </div>
            <hr>
            <div>
                <span class="label">Jumlah Dibayar:</span>
                <span class="value"><b>Rp {{ number_format($booking->dibayar, 0, ',', '.') }}</b></span>
            </div>
        </div>

        <div class="footer">
            <h2>Detail Pembayaran</h2>
            <ul>
                <li>Transaksi berhasil dilakukan.</li>
                <li>Harap simpan bukti ini untuk referensi di masa mendatang.</li>
            </ul>
        </div>
    </div>

</body>
</html>
