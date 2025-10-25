<div class="page-wrapper space-y-6">
    <div class="flex flex-wrap justify-between gap-3">
        <input type="search"
            class="input bg-white text-black border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500 w-full sm:w-auto"
            placeholder="Cari" wire:model.lazy="search"/>

        <button class="btn bg-yellow-400 text-black flex items-center px-4 py-2 rounded-lg hover:bg-yellow-500 transition-all duration-200"
            wire:click="$dispatch('createMenu')">
            <i class="ti ti-plus text-black text-lg"></i>
            <span class="ml-2">Tambah menu</span>
        </button>
    </div>

    <!-- ✅ Membuat tabel lebih responsif -->
    <div class="table-wrapper overflow-x-auto">
        <table class="table min-w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Menu</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2 hidden md:table-cell">Keterangan</th> <!-- ✅ Disembunyikan di layar kecil -->
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($menus as $menu)
                <tr class="border-b">
                    <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="w-12 h-12 rounded-lg overflow-hidden">
                                    <img src="{{  $menu->gambar }}" alt="Gambar Menu" class="object-cover w-full h-full">
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-bold">{{ $menu->name }}</div>
                                <div class="text-sm text-gray-600">{{ $menu->type }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-2">{{ $menu->harga }}</td>
                    <td class="px-4 py-2 hidden md:table-cell">
                        <div class="line-clamp-2">{{ $menu->desc }}</div>
                    </td>
                    <td class="px-4 py-2 text-center">
                        <div class="flex flex-wrap justify-center gap-2">
                            <!-- ✅ Tombol Edit -->
                            <button class="btn btn-xs btn-square bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded flex items-center justify-center transition-all duration-200"
                                wire:click="$dispatch('editMenu', { menu: {{ $menu->id }} })">
                                <i class="ti ti-edit text-white text-lg font-bold"></i>
                            </button>

                            <!-- ✅ Tombol Hapus -->
                            <button class="btn btn-xs btn-square bg-red-500 hover:bg-red-600 text-black p-2 rounded flex items-center justify-center transition-all duration-200"
                                wire:click="$dispatch('deleteMenu', { menu: {{ $menu->id }} })">
                                <i class="ti ti-trash text-black text-xl font-bold"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('menu.actions')

</div>
