<div class="mb-6">
    @if (session()->has('message'))
        <div class="p-2 bg-green-200 text-green-800 rounded mb-2">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-3">
        <input type="text" wire:model="nama_kampanye" placeholder="Nama Kampanye"
               class="w-full p-2 border rounded" />
        @error('nama_kampanye') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <select wire:model="kategori_id" class="w-full p-2 border rounded">
            <option value="">Pilih Kategori</option>
            @foreach($kategoriList as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
        @error('kategori_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <input type="number" wire:model="target" placeholder="Target Donasi (Rp)"
               class="w-full p-2 border rounded" />
        @error('target') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                {{ $isEdit ? 'Update' : 'Tambah' }}
            </button>
            @if($isEdit)
                <button type="button" wire:click="resetForm" class="px-4 py-2 bg-gray-400 text-white rounded">
                    Batal
                </button>
            @endif
        </div>
    </form>
</div>
