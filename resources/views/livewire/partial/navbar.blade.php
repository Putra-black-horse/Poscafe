<div class="navbar bg-base-400  bg-slate-200 shadow-sm print:hidden">
  <!-- Bagian Kiri -->
  <div class="navbar-start">
      <label for="drawer" class="btn btn-ghost btn-circle relative">
          <i class="ti ti-menu text-xl font-semibold stroke-[1.5]"></i>
          <!-- Notifikasi Kecil -->
          <span class="w-[6px] h-[6px] bg-red-600 rounded-full absolute top-[6px] right-[6px]"></span>
      </label>
  </div>

  <!-- Bagian Tengah -->
  <div class="navbar-center">
      <a href="{{ route('home') }}" class="btn btn-ghost text-xl" wire:navigate>
          {{ config('app.name') }}
      </a>
  </div>

  <!-- Bagian Kanan -->
  <div class="navbar-end space-x-1">
      <!-- ➕ Tombol Plus -->
      <button class="btn btn-ghost btn-circle hover:bg-gray-500 p-2">
          <a href="{{ route('transaksi.create') }}"  wire:navigate>
            <i class="ti ti-plus text-xl font-semibold stroke-[1.5]"></i>
          </a>
      </button>

      <!-- 🔔 Tombol Notifikasi -->
      {{-- <button class="btn btn-ghost btn-circle hover:bg-gray-200 p-2 relative">
          <div class="indicator">
              <i class="ti ti-bell text-xl font-semibold stroke-[1.5]"></i>
              <span class="w-[8px] h-[8px] bg-red-500 text-white rounded-full absolute top-[4px] right-[4px]"></span>
          </div>
      </button> --}}
  </div>
</div>
