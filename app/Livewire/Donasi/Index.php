<?php

namespace App\Livewire\Donasi;

use Livewire\Component;
use App\Models\Donasi;

class Index extends Component
{
    public $donasi;

    protected $listeners = ['donasiUpdated' => 'loadData'];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->donasi = Donasi::with(['donatur', 'kategori', 'transaksi.kampanye'])->latest()->get();
    }

    public function render()
    {
        return view('livewire.donasi.index');
    }
}

