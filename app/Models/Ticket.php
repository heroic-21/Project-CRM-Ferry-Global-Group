<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tiket',
        'from',
        'to',
        'way',
        'jenis_pembayaran',
        'kelas_tiket',
        'deparature_date',
        'deparature_time',
        'id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function penumpangs()
    {
        return $this->hasMany(Penumpang::class, 'id_tiket');
    }
}
