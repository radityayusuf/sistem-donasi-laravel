<x-app-layout>
    <div class="max-w-5xl mx-auto mt-12 p-6 bg-white shadow-lg rounded-2xl border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">📣 Manajemen Kampanye</h2>

        @livewire('kampanye.form')

        @if (session()->has('message'))
            <div class="p-3 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm mb-4">
                ✅ {{ session('message') }}
            </div>
        @endif

        <ul class="divide-y divide-gray-200 space-y-2">
            @forelse ($kampanye as $item)
                <li class="py-4 flex flex-col sm:flex-row sm:justify-between sm:items-center bg-gray-50 hover:bg-gray-100 rounded-lg px-4 transition">
                    <div class="w-full sm:w-3/4">
                        <div class="font-semibold text-indigo-700 text-lg">{{ $item->nama_kampanye }}</div>
                        <div class="text-sm text-gray-600 mt-1 leading-snug">
                            🏷️ Kategori: <span class="font-medium">{{ $item->kategori->nama_kategori }}</span><br>
                            🎯 Target: <span class="text-gray-800 font-semibold">Rp{{ number_format($item->target) }}</span><br>
                            💰 Terkumpul: Rp{{ number_format($item->jumlah_terkumpul) }} 
                            ({{ $item->persen_terkumpul }}%)
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full h-3 bg-gray-200 rounded-full mt-3">
                            <div class="h-full rounded-full bg-green-500 transition-all duration-300"
                                 style="width: {{ $item->persen_terkumpul }}%"></div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex sm:flex-col sm:items-end gap-2 mt-4 sm:mt-0">
                        <button wire:click="edit({{ $item->id }})"
                            class="px-4 py-1 text-sm font-medium bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg shadow">
                            ✏️ Edit
                        </button>
                        <button wire:click="delete({{ $item->id }})"
                            class="px-4 py-1 text-sm font-medium bg-red-500 hover:bg-red-600 text-white rounded-lg shadow">
                            🗑️ Hapus
                        </button>
                    </div>
                </li>
            @empty
                <li class="text-center text-gray-500 py-4">Belum ada kampanye.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
