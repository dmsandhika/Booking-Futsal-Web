<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lapangan extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $table = 'lapangan';
    protected $fillable = ['nama', 'keterangan', 'image', 'harga'];

    public function bookings():HasMany{
        return $this->hasMany(Booking::class, 'id_lapangan');
    }
}