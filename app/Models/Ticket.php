<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'penumpang_id',
        'kode',
        'nama_kereta',
        'asal',
        'tujuan',
        'tanggal_berangkat',
    ];

    public function penumpang() {
        return $this->hasOne(Penumpang::class, 'penumpang_id', 'id');
    }
}