<div class="page-wrapper">
    <form class="card max-w-lg mx-auto" wire:submit="simpan">
        <div class="card-body">
            <h3 class="card-title">Update Profile</h3>

            <div class="py-4 space-y-2">
                <label class="fieldset">
                    <legend class="fieldset-legend text-black text-lg">Nama Lengkap</legend>
                    <input type="text" 
                           class="input bg-white border-4 border-gray-500 rounded-lg p-2 w-full focus:ring-2 focus:ring-grey-500 focus:outline-none" 
                           @class([ 'input input-bordered','input-error' => $errors->first('name')])
                           wire:model="name"
                           placeholder="Type here" />
                </label>

                <label class="fieldset">
                    <legend class="fieldset-legend text-black text-lg">Email</legend>
                    <input type="email" 
                           class="input bg-white border-4 border-gray-500 rounded-lg p-2 w-full focus:ring-2 focus:ring-grey-500 focus:outline-none" 
                           @class([ 'input input-bordered','input-error' => $errors->first('email')])
                           wire:model="email" 
                           autocomplete="email"
                           placeholder="Type here" />
                </label>

                <label class="fieldset">
                    <legend class="fieldset-legend text-black text-lg">Password</legend>
                    <input type="password" 
                           class="input bg-white border-4 border-gray-500 rounded-lg p-2 w-full focus:ring-2 focus:ring-grey-500 focus:outline-none" 
                           @class([ 'input input-bordered','input-error' => $errors->first('password')])
                           wire:model="password"
                           placeholder="Isi Apabila Ingin Mengganti Password" />
                </label>

            </div>
            
            <div class="card-actions">
                <button class="btn btn-warning flex items-center">
                    <i class="ti ti-check text-xl text-black"></i>
                    <span> Simpan</span>
                </button>
            </div>
        </div>
    </form>
</div>
