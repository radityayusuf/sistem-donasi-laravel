<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-10 px-4">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-200">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6 rounded-t-2xl">
                <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    Manajemen Kategori
                </h2>
            </div>

            {{-- Konten --}}
            <div class="p-6 bg-slate-50">
                {{-- Form Tambah Kategori --}}
                @livewire('kategori.form')

                {{-- Tabel Kategori --}}
                <div class="overflow-x-auto mt-6">
                    <table class="w-full table-auto text-sm border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                        <thead class="bg-indigo-100 text-indigo-700 uppercase text-left">
                            <tr>
                                <th class="px-4 py-3 font-medium">No</th>
                                <th class="px-4 py-3 font-medium">Nama Kategori</th>
                                <th class="px-4 py-3 text-center font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100 text-gray-700">
                            @forelse ($kategori as $index => $item)
                                <tr class="hover:bg-indigo-50 transition">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3">{{ $item->nama_kategori }}</td>
                                    <td class="px-4 py-3 text-center space-x-2">
                                        <button wire:click="edit({{ $item->id }})"
                                            class="px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 transition">
                                            ✏️ Edit
                                        </button>
                                        <button wire:click="delete({{ $item->id }})"
                                            class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                            🗑️ Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500 italic">
                                        Belum ada kategori.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
