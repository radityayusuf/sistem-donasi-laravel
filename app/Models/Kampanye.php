<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
    protected $table = 'kampanye'; //  TAMBAHKAN INI
    protected $fillable = ['nama_kampanye', 'kategori_id', 'target'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function transaksiDonasi()
    {
        return $this->hasMany(TransaksiDonasi::class);
    }

    public function getJumlahTerkumpulAttribute()
{
    return $this->transaksiDonasi()
        ->where('status', 'confirmed')
        ->join('donasi', 'donasi.id', '=', 'transaksi_donasi.donasi_id')
        ->sum('donasi.jumlah');
}

public function getPersenTerkumpulAttribute()
{
    if ($this->target == 0) return 0;
    return min(100, round(($this->jumlah_terkumpul / $this->target) * 100));
}

}


