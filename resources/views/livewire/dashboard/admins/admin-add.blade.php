<div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-user-plus mr-3"></i> Add New Admin
    </p>

    @if (session()->has('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="leading-loose">
        <form wire:submit.prevent="saveAdmin" class="p-10 bg-white rounded shadow-xl">
            <div class="mb-4">
                <label class="block text-sm text-gray-600">Admin Name</label>
                <input wire:model="name" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" type="text" placeholder="Enter admin name">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Admin Email</label>
                <input wire:model="email" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" type="email" placeholder="Enter admin email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Password</label>
                <input wire:model="password" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" type="password" placeholder="Enter password">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Confirm Password</label>
                <input wire:model="password_confirmation" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" type="password" placeholder="Confirm password">
                @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Admin Role</label>
                <input wire:model="role" type="checkbox" class="rounded" value="1" 
                    @if($role == 1) checked @endif>
                <label class="ml-2 text-sm text-gray-600">Is Admin</label>
                @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            
            
            

            <div class="mt-6">
                <button class="px-4 py-2 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-700 rounded" type="submit">
                    Add Admin
                </button>
            </div>
        </form>
    </div>
</div>
