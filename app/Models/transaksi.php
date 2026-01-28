<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'id_pelanggan');
    }

    public function layanan()
    {
        return $this->belongsTo(layanan::class, 'id_layanan');
    }
}
