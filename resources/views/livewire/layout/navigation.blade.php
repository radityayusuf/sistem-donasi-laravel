<nav x-data="{ open: false }" class="bg-gradient-to-r from-indigo-100 to-purple-200 border-b border-indigo-300 shadow-md transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo & Brand -->
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" wire:navigate>
                    <x-application-logo class="h-8 w-auto text-indigo-700" />
                    <span class="text-lg font-semibold text-gray-800 tracking-wide">Sistem Donasi</span>
                </a>
            </div>

            <!-- Nav Links -->
            <div class="hidden sm:flex space-x-8">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    Dashboard
                </x-nav-link>
                <x-nav-link :href="route('kategori.index')" :active="request()->routeIs('kategori.*')" wire:navigate>
                    Kategori
                </x-nav-link>
                <x-nav-link :href="route('kampanye.index')" :active="request()->routeIs('kampanye.*')" wire:navigate>
                    Kampanye
                </x-nav-link>
                <x-nav-link :href="route('donasi.index')" :active="request()->routeIs('donasi.*')" wire:navigate>
                    Donasi
                </x-nav-link>
            </div>

            <!-- User & Actions -->
            <div class="hidden sm:flex items-center gap-4">
                <!-- Dark Mode Toggle -->
                <button id="dark-toggle" class="text-gray-600 hover:text-indigo-600 transition">
                    <svg id="moon-icon" class="w-5 h-5 hidden dark:inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                    <svg id="sun-icon" class="w-5 h-5 hidden dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3v1m0 16v1m8.66-8.66l-.7.7m-13.92 0l-.7-.7M21 12h-1M4 12H3m2.34 5.66l.7.7m13.92 0l.7-.7" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md bg-white text-gray-700 hover:bg-gray-100 transition">
                            <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            Profile
                        </x-dropdown-link>
                        <button wire:click="logout" class="w-full text-left">
                            <x-dropdown-link>
                                Log Out
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (mobile) -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md text-gray-700 hover:bg-gray-200 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden bg-white border-t border-indigo-200">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                Dashboard
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kategori.index')" :active="request()->routeIs('kategori.*')" wire:navigate>
                Kategori
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kampanye.index')" :active="request()->routeIs('kampanye.*')" wire:navigate>
                Kampanye
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('donasi.index')" :active="request()->routeIs('donasi.*')" wire:navigate>
                Donasi
            </x-responsive-nav-link>
        </div>

        <!-- User Info (mobile) -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ auth()->user()->name }}</div>
                <div class="font-medium text-sm text-gray-600">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    Profile
                </x-responsive-nav-link>
                <button wire:click="logout" class="w-full text-left">
                    <x-responsive-nav-link>
                        Log Out
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
