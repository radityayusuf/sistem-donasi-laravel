<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDonasi extends Model
{
    protected $table = 'transaksi_donasi'; // ✅ Tambahkan ini

    protected $fillable = ['donasi_id', 'kampanye_id', 'status'];

    public function donasi()
    {
        return $this->belongsTo(Donasi::class);
    }

    public function kampanye()
    {
        return $this->belongsTo(Kampanye::class);
    }
}


