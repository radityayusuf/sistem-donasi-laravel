<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;

class Index extends Component
{
    public $kategori;

    protected $listeners = ['kategoriUpdated' => 'loadData'];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->kategori = Kategori::latest()->get();
    }

    public function delete($id)
    {
        Kategori::destroy($id);
        session()->flash('message', 'Kategori berhasil dihapus.');
        $this->loadData();
    }

    public function edit($id)
    {
        $this->dispatch('editKategori', $id)->to('kategori.form');
    }

    public function render()
    {
        return view('livewire.kategori.index');
    }
}
