<div class="page-wrapper">
    <div class="card card-divider">
         <div class="card-body space-y-4 mx-auto">
            <h3 class="text-lg text-black font-bold">
                <p> Export data transaksi
                    Untuk mengexport data transaksi atau mendapatkan rekap data transaksi dalam bentuk excel,
                    pilih bulan terlebih dahulu kemudian klik"export data".
                </p>
            </h3>
        </div>

        <div class="card-body py-4">
            <form class="card-actions justify-betweaen" wire:submit="export">
                <div class="flex flex-col space-y-2 relative">
                    <input 
                        type="month"
                        @class([
                            'input  bg-white text-black border border-gray-600',
                            'input-error-border' => $errors->has('bulan')
                        ]) 
                        wire:model="bulan"
                    >
                    
                    @error('bulan')
                        <span class="input-error-text">{{ $message }}</span>
                    @enderror
                </div>
        
                <button class="btn btn-primary"> 
                    <i class="ti ti-upload text-xl"></i>
                    <span>Export Data</span> 
                </button> 
            </form>
        </div>
        
    </div>
</div>
