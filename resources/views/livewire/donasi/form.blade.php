<div class="mb-6">
    @if (session()->has('message'))
        <div class="p-2 bg-green-100 text-green-800 rounded">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" class="space-y-3">
        <select wire:model="kategori_id" class="w-full border p-2 rounded">
            <option value="">Pilih Kategori</option>
            @foreach($kategoriList as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>

        <select wire:model="kampanye_id" class="w-full border p-2 rounded">
            <option value="">Pilih Kampanye</option>
            @foreach($kampanyeList as $kampanye)
                <option value="{{ $kampanye->id }}">{{ $kampanye->nama_kampanye }}</option>
            @endforeach
        </select>

        <input type="number" wire:model="jumlah" placeholder="Jumlah Donasi" class="w-full border p-2 rounded" />
        <input type="date" wire:model="tanggal" class="w-full border p-2 rounded" />

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Donasi</button>
    </form>
</div>
