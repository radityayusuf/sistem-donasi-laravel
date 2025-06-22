<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; //  Tambahkan baris ini
    protected $fillable = ['nama_kategori'];

    public function kampanye()
    {
        return $this->hasMany(Kampanye::class);
    }

    public function donasi()
    {
        return $this->hasMany(Donasi::class);
    }
}
