<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;

class Form extends Component
{
    public $nama_kategori;
    public $kategori_id;
    public $isEdit = false;

    protected $rules = [
        'nama_kategori' => 'required|string|max:255',
    ];

    protected $listeners = ['editKategori' => 'loadData'];

    public function save()
    {
        $this->validate();

        if ($this->isEdit && $this->kategori_id) {
            $kategori = Kategori::find($this->kategori_id);
            $kategori->update(['nama_kategori' => $this->nama_kategori]);
            session()->flash('message', 'Kategori berhasil diperbarui.');
        } else {
            Kategori::create(['nama_kategori' => $this->nama_kategori]);
            session()->flash('message', 'Kategori berhasil ditambahkan.');
        }

        $this->resetForm();
        $this->dispatch('kategoriUpdated');
    }

    public function loadData($id)
    {
        $kategori = Kategori::find($id);
        $this->kategori_id = $kategori->id;
        $this->nama_kategori = $kategori->nama_kategori;
        $this->isEdit = true;
    }

    public function resetForm()
    {
        $this->nama_kategori = '';
        $this->kategori_id = null;
        $this->isEdit = false;
    }

    public function render()
    {
        return view('livewire.kategori.form');
    }
}
