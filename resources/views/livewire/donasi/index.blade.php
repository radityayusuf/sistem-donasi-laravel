<x-app-layout>
    <div class="max-w-6xl mx-auto mt-12 px-6">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-indigo-600 to-purple-700 px-6 py-5">
                <h2 class="text-2xl font-bold text-white tracking-wide">📊 Riwayat Donasi</h2>
                <p class="text-indigo-100 text-sm mt-1">Berikut adalah daftar kontribusi donatur dalam kampanye aktif.</p>
            </div>

            {{-- Form Donasi --}}
            <div class="p-6 bg-gray-50 border-b border-gray-200">
                @livewire('donasi.form')
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto px-6 pb-6">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-indigo-50 text-indigo-800 uppercase text-left">
                        <tr>
                            <th class="px-4 py-3 font-semibold">Donatur</th>
                            <th class="px-4 py-3 font-semibold">Kategori</th>
                            <th class="px-4 py-3 font-semibold">Kampanye</th>
                            <th class="px-4 py-3 font-semibold text-right">Jumlah</th>
                            <th class="px-4 py-3 font-semibold">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100 text-gray-800">
                        @forelse ($donasi as $d)
                            <tr class="hover:bg-indigo-50 transition-all duration-200">
                                <td class="px-4 py-3">{{ $d->donatur->nama ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $d->kategori->nama_kategori ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $d->transaksi->kampanye->nama_kampanye ?? '-' }}</td>
                                <td class="px-4 py-3 text-right font-semibold text-green-600">
                                    Rp{{ number_format($d->jumlah) }}
                                </td>
                                <td class="px-4 py-3 text-gray-500">
                                    {{ \Carbon\Carbon::parse($d->tanggal)->translatedFormat('d F Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 italic py-6">Belum ada riwayat donasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
