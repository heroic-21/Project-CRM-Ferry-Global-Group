<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_penumpangs',
        'nama_penumpang',
        'nomor_passport',
        'domisili',
        'jenis_kelamin',
        'tanggal_lahir',
        'id_tiket'
    ];

    public function tiket()
    {
        return $this->belongsTo(Ticket::class, 'id_tiket');
    }
}
