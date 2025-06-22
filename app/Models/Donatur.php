<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur'; // ✅ WAJIB: karena Laravel default-nya 'donaturs'
    protected $fillable = ['nama', 'email', 'telepon'];

    public function donasi()
    {
        return $this->hasMany(Donasi::class);
    }
}

