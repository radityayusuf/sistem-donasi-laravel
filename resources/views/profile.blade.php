<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center gap-3 text-indigo-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5.121 17.804A8.966 8.966 0 0112 15c1.933 0 3.706.613 5.121 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <h2 class="text-2xl font-bold tracking-tight text-center">Pengaturan Profil</h2>
        </div>
    </x-slot>

    <div class="min-h-screen py-16 bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="max-w-3xl mx-auto space-y-10 px-4">
            
            <!-- Kartu Ubah Profil -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold text-indigo-600 mb-4 text-center">📝 Informasi Profil</h3>
                <div class="max-w-xl mx-auto">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <!-- Kartu Ubah Password -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold text-indigo-600 mb-4 text-center">🔒 Ubah Password</h3>
                <div class="max-w-xl mx-auto">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <!-- Kartu Hapus Akun -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-md border border-red-200">
                <h3 class="text-lg font-semibold text-red-600 mb-4 text-center">⚠️ Hapus Akun</h3>
                <div class="max-w-xl mx-auto">
                    <livewire:profile.delete-user-form />
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
