<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box bg-white text-black border border-gray-300 shadow-lg" 
        wire:submit="simpan">
            <h3 class="text-lg font-bold mb-4">Tambah Customer</h3>


            <div class="space-y-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend font-semibold text-gray-700">Nama Customer</legend>
                    <input type="text" 
                        class="input bg-white w-full p-2 rounded-lg border-2 border-yellow-400 focus:ring focus:ring-yellow-300 focus:border-yellow-500" 
                        placeholder="Masukkan nama menu" 
                        @class(['input input-bordered', 'input-error' => $errors->first('form.name'),
                        ]) wire:model="form.name" />
                    <p class="text-sm text-gray-500 mt-1">Wajib diisi</p>
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend font-semibold text-gray-700">Kontak customer</legend>
                    <input type="text" 
                        class="input bg-white w-full p-2 rounded-lg border-2 border-yellow-400 focus:ring focus:ring-yellow-300 focus:border-yellow-500" 
                        placeholder="Masukkan harga"
                        @class(['input input-bordered', 'input-error' => $errors->first('form.contact'),]) wire:model="form.contact" />
                    <p class="text-sm text-gray-500 mt-1">Wajib diisi</p>
                </fieldset>
                

                <fieldset class="fieldset">
                    <legend class="fieldset-legend font-semibold text-gray-700">Keterangan</legend>
                    <textarea class="input bg-white w-full p-2 rounded-lg border-2 border-yellow-400 focus:ring focus:ring-yellow-300 focus:border-yellow-500 h-32" placeholder="Tambahkan keterangan menu"
                    @class(['textarea textarea-bordered', 'textarea-error' => $errors->first('form.desc'),
                    ]) wire:model="form.desc"></textarea>
                    <p class="text-sm text-gray-500 mt-1">Opsional</p>
                </fieldset>
            </div>

            <div class="modal-action mt-4 justify-between">
                <button class="btn btn-ghost border border-gray-400 px-4 py-2 rounded-lg" wire:click="closeModal">Tutup</button>

                <button class="btn bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg" ><span>Simpan</span>
                    <i class="ti ti-check text-lg font-bold"></i>
                </button>
                
            </div>
        </form>
    </div>
</div>
