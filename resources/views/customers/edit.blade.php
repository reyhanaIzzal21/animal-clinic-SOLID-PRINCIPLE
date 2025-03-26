<x-app>
    <div class="max-w-lg mx-auto p-6 bg-white shadow-xl rounded-lg">
        <h2 class="text-2xl font-semibold text-[#FBA518] mb-6 text-center">Perbarui Customer</h2>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-medium">Nama Customer</label>
                <input type="text" name="name" value="{{ old('name', $customer->name) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('name')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="address" class="block text-gray-700 font-medium">Alamat</label>
                <input type="text" name="address" value="{{ old('address', $customer->address) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('address')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $customer->email) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('email')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-gray-700 font-medium">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('phone')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('customers.index') }}"
                    class="px-5 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Batal</a>
                <button type="submit"
                    class="px-5 py-3 bg-[#FBA518] text-white rounded-lg hover:bg-[#E59400] transition">Perbarui</button>
            </div>
        </form>
    </div>
</x-app>
