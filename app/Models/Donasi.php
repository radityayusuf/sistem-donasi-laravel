<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi'; // ✅ Ini wajib
    protected $fillable = ['donatur_id', 'kategori_id', 'jumlah', 'tanggal'];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function transaksi()
    {
        return $this->hasOne(TransaksiDonasi::class);
    }
}

