<div class="mb-6">
    @if (session()->has('message'))
        <div class="p-3 rounded-lg bg-green-100 text-green-800 border border-green-300 mb-4 shadow-sm">
            ✅ {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="flex flex-col gap-3 sm:flex-row sm:items-start sm:gap-4">
        <div class="flex-1">
            <input type="text" wire:model="nama_kategori" placeholder="Nama Kategori"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm" />
            @error('nama_kategori')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium shadow transition">
                {{ $isEdit ? '🔄 Update' : '➕ Tambah' }}
            </button>

            @if ($isEdit)
                <button type="button" wire:click="resetForm"
                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg font-medium shadow transition">
                    ✖ Batal
                </button>
            @endif
        </div>
    </form>
</div>
