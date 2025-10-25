<div class="card bg-white shadow-lg rounded-lg">
    <form class="card-body" wire:submit.prevent="login">
        <h3 class="card-title text-gray-900">Selamat Datang</h3>
  
        <div class="py-4">
            <!-- 🔹 Input Username -->
            <label class="block text-gray-700 font-bold mb-1">Username</label>
            <div class="input-group @error('email') has-error @enderror">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </g>
                </svg>
                <input type="text"
                       placeholder="Username"
                       wire:model="email"
                       class="peer input-field "/>
            </div>
            @error('email') 
                <p class="input-error">Username harus diisi!</p>
            @enderror
        </div>
  
        <!-- 🔹 Input Password -->
        <div class="py-4">
            <label class="block text-gray-700 font-bold mb-1">Password</label>
            <div class="input-group @error('email') has-error @enderror">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                        <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path>
                        <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                    </g>
                </svg>
                <input type="password"
                       placeholder="Password"
                       wire:model="password"
                       class="peer input-field "/>
            </div>
            @error('password') 
                <p class="input-error">Password harus diisi!</p>
            @enderror
        </div>
  
        <!-- 🔹 Tombol Login -->
        <div class="card-actions">
            <button type="submit" 
                    class="btn bg-yellow-500 hover:bg-yellow-600 text-black font-bold flex items-center mb-2 ml-20 mr-20">
                <i class="ti ti-login size-5 mt-1"></i>
                <span>Login</span>
            </button>
        </div>
    </form>
  </div>
  