<?php
namespace App\Livewire\Kampanye;

use Livewire\Component;
use App\Models\Kampanye;

class Index extends Component
{
    public $kampanye;

    protected $listeners = ['kampanyeUpdated' => 'loadData'];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->kampanye = Kampanye::with('kategori')->latest()->get();
    }

    public function edit($id)
    {
        $this->dispatch('editKampanye', $id)->to('kampanye.form');
    }

    public function delete($id)
    {
        Kampanye::destroy($id);
        session()->flash('message', 'Kampanye dihapus.');
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.kampanye.index');
    }
}

