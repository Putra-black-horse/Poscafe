<div class="page-wrapper p-4">
    <!-- GRID Responsif -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
        <div class="card">
            <div class="card-body flex flex-wrap items-center gap-3">
                <div class="avatar placeholder">
                    <div class="icon-circle">
                        <i class="ti ti-calendar-month text-4xl icon-pos-center"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-70">Pendapatan Bulan ini</div>
                    <div class="text-2xl font-bold">Rp. {{ Number::format($monthly) }}</div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body flex flex-wrap items-center gap-3">
                <div class="avatar placeholder">
                    <div class="icon-circle">
                        <i class="ti ti-calendar-check text-4xl icon-pos-center"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-70">Pendapatan Hari ini</div>
                    <div class="text-2xl font-bold">Rp. {{ Number::format($today->sum('price')) }}</div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body flex flex-wrap items-center gap-3">
                <div class="avatar placeholder">
                    <div class="icon-circle">
                        <i class="ti ti-list-check text-4xl icon-pos-center"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-70">Total Pesanan Hari Ini</div>
                    <div class="text-2xl font-bold">{{ $today->count() }} Pesanan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL RESPONSIF -->
    <div class="table-wrapper mt-6 overflow-x-auto">
        <table class="table w-full min-w-[600px]">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Keterangan</th>
                    <th class="px-4 py-2">Customer</th>
                    <th class="px-4 py-2">Total Bayar</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Cetak</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr wire:key="{{ $data->id }}" class="border-b">
                    <td class="px-4 py-2">{{ $data->id }}</td>
                    <td class="px-4 py-2">{{ $data->created_at->diffForHumans() }}</td>
                    <td class="px-4 py-2">{{ $data->desc }}</td>
                    <td class="px-4 py-2">{{ $data->customer?->name }}</td>
                    <td class="px-4 py-2">Rp.{{ Number::format($data->price ) }}</td>
                    <td class="px-4 py-2">
                        <input type="checkbox" class="toggle bg-slate-300 toggle-sm toggle-warning before:bg-gray-700 before:border-gray-500"
                               @checked($data->done) wire:change="toggleDone({{ $data->id }})" />
                    </td>
                    <td>
                    <button class="btn btn-sm"onclick="return cetakStruk('{{ route('transaksi.cetak', $data) }}')">
                        <i class="ti ti-printer text-2xl "></i>
                        <span>Cetak</span>
                    </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
