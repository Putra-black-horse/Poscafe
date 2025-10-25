<div class="page-wrapper space-y-6">
    <div class="flex justify-between">
        <input type="search" class="input bg-white text-black border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Cari"
        wire:model.lazy="search">

       
        <button class="btn bg-yellow-400 text-black " wire:click="$dispatch('createCustomer')">
            <i class="ti ti-plus text-black text-lg "></i>
            <span>Tambah Customer</span>
        </button>
        
        </input>
    </div>


<div class="table-wrapper">
<table class="table">
    <thead>
        <th>No</th>
        <th>Nama Customer</th>
        <th>Kontak</th>
        <th>Keterangan</th>
        <th>Actions</th>
    </thead>

    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $loop->iteration }}</td>  <!-- ✅ Menampilkan Nomor Urut -->
            <td>{{ $customer->name }}</td>  <!-- Menambahkan nama customer-->
            <td>{{ $customer->contact }}</td>  <!-- Menambahkan nama customer-->
            <td>{{ Str::limit($customer->desc,50) }}</td>  <!-- Menambahkan nama customer-->
          
            <td class="text-center">
                <div class="flex items-center justify-between space-x-2">
                    <!-- Tombol Edit -->
                    <button class="btn btn-xs btn-square bg-gray-300 hover:bg-yellow-600 text-white p-2 rounded flex items-center justify-center" 
                        wire:click="$dispatch('editCustomer', { customer: {{ $customer->id }} })">
                        <i class="ti ti-edit text-black text-lg font-bold"></i>
                    </button>
            
                    <!-- Tombol Hapus -->
                    <button class="btn btn-xs btn-square bg-gray-300 hover:bg-yellow-600 text-white p-2 rounded flex items-center justify-center" 
                        wire:click="$dispatch('deleteCustomer', { customer: {{ $customer->id }} })">
                        <i class="ti ti-trash text-black text-lg font-bold"></i>
                    </button>
                </div>
            </td>
            
        </tr>
        @endforeach
    </tbody>

</table>
</div>


@livewire('customer.actions')

</div>
