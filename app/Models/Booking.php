<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = ['id_pembayaran','nama', 'id_lapangan', 'tanggal_booking','jam_mulai', 'jam_selesai', 'properti', 'total_harga', 'dibayar', 'jenis_pembayaran'];

    public function lapangan(): BelongsTo {
        return $this->belongsTo(Lapangan::class, 'id_lapangan', 'id');
    }
}