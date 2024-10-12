<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = ['nama', 'lapangan', 'tanggal_booking','jam_mulai', 'jam_selesai', 'properti', 'total_harga'];
}