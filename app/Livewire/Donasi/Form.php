<?php
namespace App\Livewire\Donasi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Donasi;
use App\Models\Kategori;
use App\Models\Kampanye;
use App\Models\TransaksiDonasi;

class Form extends Component
{
    public $kategori_id, $kampanye_id, $jumlah, $tanggal;

    protected $rules = [
        'kategori_id' => 'required',
        'kampanye_id' => 'required',
        'jumlah' => 'required|numeric|min:1000',
        'tanggal' => 'required|date',
    ];

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $donatur = $user->donatur;

        if (!$donatur) {
            session()->flash('message', 'Akun Anda belum terhubung sebagai donatur.');
            return;
        }

        // Validasi jumlah tidak melebihi target
        $kampanye = Kampanye::find($this->kampanye_id);
        $terkumpul = TransaksiDonasi::where('kampanye_id', $kampanye->id)
            ->where('status', 'confirmed')
            ->join('donasi', 'donasi.id', '=', 'transaksi_donasi.donasi_id')
            ->sum('donasi.jumlah');

        if ($terkumpul + $this->jumlah > $kampanye->target) {
            session()->flash('message', 'Jumlah donasi melebihi target kampanye.');
            return;
        }

        $donasi = Donasi::create([
            'donatur_id' => $donatur->id,
            'kategori_id' => $this->kategori_id,
            'jumlah' => $this->jumlah,
            'tanggal' => $this->tanggal,
        ]);

        TransaksiDonasi::create([
            'donasi_id' => $donasi->id,
            'kampanye_id' => $this->kampanye_id,
            'status' => 'confirmed',
        ]);

        session()->flash('message', 'Donasi berhasil disimpan.');
        $this->reset(['kategori_id', 'kampanye_id', 'jumlah', 'tanggal']);
        $this->dispatch('donasiUpdated');
    }

    public function render()
    {
        return view('livewire.donasi.form', [
            'kategoriList' => Kategori::all(),
            'kampanyeList' => Kampanye::all(),
        ]);
    }
}
