<?php

namespace App\Livewire\Kampanye;

use Livewire\Component;
use App\Models\Kampanye;
use App\Models\Kategori;

class Form extends Component
{
    public $nama_kampanye;
    public $kategori_id;
    public $target;
    public $kampanye_id;
    public $isEdit = false;

    protected $rules = [
        'nama_kampanye' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategori,id',
        'target' => 'required|numeric|min:1000',
    ];

    protected $listeners = ['editKampanye' => 'loadData'];

    public function save()
    {
        $this->validate();

        if ($this->isEdit) {
            $kampanye = Kampanye::find($this->kampanye_id);
            $kampanye->update([
                'nama_kampanye' => $this->nama_kampanye,
                'kategori_id' => $this->kategori_id,
                'target' => $this->target,
            ]);
            session()->flash('message', 'Kampanye diperbarui.');
        } else {
            Kampanye::create([
                'nama_kampanye' => $this->nama_kampanye,
                'kategori_id' => $this->kategori_id,
                'target' => $this->target,
            ]);
            session()->flash('message', 'Kampanye ditambahkan.');
        }

        $this->resetForm();
        $this->dispatch('kampanyeUpdated');
    }

    public function loadData($id)
    {
        $k = Kampanye::find($id);
        $this->kampanye_id = $k->id;
        $this->nama_kampanye = $k->nama_kampanye;
        $this->kategori_id = $k->kategori_id;
        $this->target = $k->target;
        $this->isEdit = true;
    }

    public function resetForm()
    {
        $this->nama_kampanye = '';
        $this->kategori_id = null;
        $this->target = '';
        $this->kampanye_id = null;
        $this->isEdit = false;
    }

    public function render()
    {
        return view('livewire.kampanye.form', [
            'kategoriList' => Kategori::all()
        ]);
    }
}
