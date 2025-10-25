<div class="page-wrapper">

    <div class="flex justify-between">
        <input type="date" class="input input-bordered bg-gray-200" wire:model.live="date">
        <a href="{{ route('transaksi.export') }}"  class="btn btn-warning text-black" wire:navigate>
            <i class="ti ti-upload text-2xl font-semibold"></i>
            <span>Export transaksi</span>
        </a>
    </div>

<div class="table-wrapper">
    <table class="table">
        <thead>
            <th>No</th>
            <th>Waktu transaksi</th>
            <th>Keterangan</th>
            <th>Customer</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th class="text-center">Action</th>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $transaksi->created_at->diffForHumans()  }}</td>
                    <td>{{ $transaksi->desc  }}</td>
                    <td>{{ $transaksi->customer?->name  }}</td>
                    <td>Rp.{{ Number::format($transaksi->price)  }}</td>
                    <td>
                        <input type="checkbox" class="toggle bg-slate-300 toggle-sm toggle-warning before:bg-gray-700 before:border-gray-500" @checked($transaksi->done) 
                        wire:change="toggleDone({{ $transaksi->id }})" />
                    </td>
                    <td>
                        <div class="flex justify-center gap-2">
                        <button  class="btn btn-xs btn-square bg-yellow-500" 
                            wire:click="$dispatch('detailTransaksi',{transaksi : {{ $transaksi->id }}})">
                            <i class="ti ti-folder text-xl"></i>   
                        </button>
                            <a   href="{{ route('transaksi.edit', $transaksi) }}" class="btn btn-xs btn-square">
                                 <i class="ti ti-edit text-xl"></i>   
                            </a>
                        <button  class="btn btn-xs btn-square bg-red-600" 
                                     wire:click="deleteTransaksi({{ $transaksi->id }})">
                                     <i class="ti ti-trash text-xl"></i>   
                        </button>
                        </div>
                    </td>
                </tr>
           @endforeach      
        </tbody>
    </table>
</div>

@livewire('transaksi.detail')
</div>

