<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'pertanyaan' => 'Bagaimana cara melakukan booking lapangan?',
            'jawaban' =>'Untuk melakukan booking lapangan, Anda perlu mengunjungi halaman pemesanan di website kami. Pertama, pilih jenis lapangan yang ingin Anda sewa. Selanjutnya, tentukan tanggal dan waktu yang diinginkan. Setelah itu, masukkan data diri Anda dan ikuti proses pembayaran yang disediakan. Setelah pembayaran berhasil, Anda akan menerima konfirmasi booking melalui email atau pesan di aplikasi kami.' 
        ]);
        Faq::create([
            'pertanyaan' => 'Apakah saya bisa membatalkan atau mengubah jadwal booking?',
            'jawaban' =>'Ya, Anda dapat membatalkan atau mengubah jadwal booking Anda. Namun, kami meminta agar perubahan dilakukan maksimal 24 jam sebelum waktu yang dijadwalkan. Untuk membatalkan atau mengubah, silakan hubungi customer service kami melalui fitur chat di website atau melalui email. Kami akan membantu memproses permintaan Anda sesuai kebijakan pembatalan yang berlaku.' 
        ]);
        Faq::create([
            'pertanyaan' => 'Apakah ada layanan tambahan selain booking lapangan?',
            'jawaban' =>'Tentu saja! Selain booking lapangan, kami juga menyediakan berbagai layanan tambahan untuk meningkatkan pengalaman bermain Anda. Anda bisa menyewa bola futsal, rompi untuk membedakan tim, dan berbagai minuman penyegar untuk menjaga hidrasi selama bermain. Pastikan untuk memilih layanan tambahan saat melakukan booking agar semuanya siap saat Anda tiba.' 
        ]);
        Faq::create([
            'pertanyaan' => 'Apakah saya perlu membayar penuh di muka?',
            'jawaban' =>'Anda memiliki dua pilihan untuk pembayaran: Anda bisa membayar 50% sebagai uang muka (DP) untuk mengonfirmasi booking Anda, atau melakukan pembayaran penuh di muka. Kami menerima berbagai metode pembayaran yang aman dan mudah, termasuk transfer bank dan pembayaran online. Setelah pembayaran diterima, Anda akan mendapatkan notifikasi konfirmasi melalui email, dan booking Anda akan terjamin.' 
        ]);
        Faq::create([
            'pertanyaan' => 'Apa saja syarat dan ketentuan untuk menggunakan lapangan?',
            'jawaban' =>'Sebelum menggunakan lapangan, semua pemain diharapkan untuk mengikuti syarat dan ketentuan yang berlaku. Ini termasuk menjaga kebersihan lapangan dan tidak membawa makanan atau minuman dari luar. Kami juga mendorong semua pemain untuk menghormati waktu bermain dan menghindari keterlambatan. Jika ada pelanggaran terhadap ketentuan ini, kami berhak untuk mengambil tindakan yang diperlukan demi kenyamanan bersama.' 
        ]);
    }
}