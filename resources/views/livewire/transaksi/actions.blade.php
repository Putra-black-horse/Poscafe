<div class="page-wrapper p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-6">
        <!-- 🔍 PENCARIAN & MENU -->
        <div class="card divide-y-2 divide-gray-400 h-fit">
            <div class="card-body">
                <label for="search" class="block text-sm font-medium">Cari Menu</label>
                <input type="search"
                    id="search"
                    class="input bg-white text-black border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500 w-full"
                    placeholder="Cari" wire:model.live="search">
            </div>

            @foreach ($menus as $type => $menu)
                <div class="card-body">
                    <h3 class="text-xl font-bold capitalize">{{ $type }}:</h3>
    
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        @foreach ($menu as $item)
                            <button class="avatar w-full" wire:click="addItem({{ $item->id }})">
                                <div class="w-full rounded-lg overflow-hidden">
                                    <img src="{{ $item->gambar }}" alt="" class="object-cover w-full h-full">
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 📝 DETAIL TRANSAKSI -->
        <div class="card h-fit">
            <form class="card-body space-y-4" wire:submit="simpan">
                <h3 class="card-title">Detail Transaksi</h3>
                  
                <!-- TABEL MENU YANG DIPILIH -->
                <div @class(['table-wrapper overflow-x-auto border-2 rounded-md',
                            'border-gray-300' => !$errors->first('items'),
                            'border-red-500' => $errors->first('items'),
                ])>
                    <table class="table min-w-[500px] w-full">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="px-1 py-1">Nama menu</th>
                                <th class="px-1 py-1">Qty</th>
                                <th class="px-1 py-1">Harga</th>
                                <th class="px-1 py-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($items ?? [] as $key => $value)
                             <tr>
                                <td class="px-1 py-1">{{ $key }}</td>
                                <td class="px-1 py-1">{{ $value['qty'] }}</td>
                                <td class="px-1 py-1">{{Number::format( $value['price']) }}</td>
                                <td class="px-1 py-1">
                                    <button class="btn btn-xs btn-square" wire:click="removeItem('{{ $key }}')">
                                        <i class="ti ti-minus text-xl font-bold"></i>
                                    </button>
                                </td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- DROPDOWN CUSTOMER -->
                <select class="select bg-white text-black border-2 border-gray-500 rounded-md px-3 py-2 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 w-full"
                wire:model="form.customer_id">
                  <option value="">Pilih Customer</option>
                    @foreach ($customers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <!-- TEXTAREA KETERANGAN -->
                <textarea rows="3"
                    @class([
                        'textarea bg-white text-black border-2 rounded-md px-3 py-2 focus:ring-2 w-full',
                        'border-gray-500 focus:border-gray-700 focus:ring-gray-700' => !$errors->first('form.desc'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500' => $errors->first('form.desc'),
                    ])
                    placeholder="Keterangan transaksi (Makan di tempat atau dibungkus)"
                    wire:model="form.desc"></textarea>

                <!-- TOTAL & BUTTON SIMPAN -->
                <div class="card-actions flex flex-col sm:flex-row justify-between gap-2 sm:gap-0">
                    <div class="flex flex-col">
                        <div class="text-xs">Total Harga</div>
                        <div class="text-2xl font-bold text-black">Rp. {{ Number::format($this->getTotalPrice()) }}</div>
                    </div>

                    <button class="btn bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-4 py-2 rounded-md shadow-md w-full sm:w-auto">
                        <i class="ti ti-check text-xl"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
