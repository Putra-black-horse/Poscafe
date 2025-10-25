<ul class="menu p-4 w-80 min-h-full bg-base-400 bg-slate-200 border-r border-base-400 space-y-4">
    <!-- Sidebar content here -->
    <li>
        <h2 class="menu-title text-2xl font-semibold text-gray-700">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }} flex items-center space-x-2">
                    <i class="ti ti-dashboard text-2xl font-semibold"></i>
                    <span class="text-lg font-semibold">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.create') }}" class="{{ request()->routeIs('transaksi.create') ? 'active' : '' }} flex items-center space-x-2">
                    <i class="ti ti-file-plus text-2xl font-semibold"></i>
                    <span class="text-lg font-semibold">Input Transaksi</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title text-2xl font-semibold text-gray-700">Data Master</h2>
        <ul>
            <li>
                <a href="{{ route('menu.index') }}" class="{{ request()->routeIs('menu.index') ? 'active' : '' }} flex items-center space-x-2">
                    <i class="ti ti-layout-grid-add text-2xl font-semibold"></i>
                    <span class="text-lg font-semibold">Menu Makanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customer.index') }}" class="{{ request()->routeIs('menu.index') ? 'active' : '' }} flex items-center space-x-2">
                    <i class="ti ti-user text-2xl font-semibold"></i>
                    <span class="text-lg font-semibold">Data Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index') }}" class="{{ request()->routeIs('transaksi.index' , 'transaksi.export') ? 'active' : '' }} flex items-center space-x-2">
                    <i class="ti ti-file text-2xl font-semibold"></i>
                    <span class="text-lg font-semibold">Riwayat Transaksi</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        
        <h2 class="menu-title text-2xl font-semibold text-gray-700">Account</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }} flex items-center space-x-2">
                    <i class="ti ti-user text-2xl font-semibold"></i>
                    <span class="text-lg font-semibold">Edit Profile</span>
                </a>
            </li>
            <li>
                <!-- Tombol Logout -->
                <button class="flex items-center space-x-2 text-left" wire:click="logout">
                    <i class="ti ti-logout text-2xl font-semibold"></i>
                    <span class="text-lg font-semibold">Logout</span>
                </button>
            </li>
        </ul>
    </li>
</ul>
