<x-app>
    <div class="max-w-lg mx-auto p-6 bg-white shadow-xl rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Tambah Customer</h2>
        <form action="{{ route('customers.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-medium">Nama Customer</label>
                <input type="text" name="name" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @if ($errors->has('name'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div>
                <label for="address" class="block text-gray-700 font-medium">Alamat</label>
                <input type="text" name="address" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @if ($errors->has('address'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('address') }}</p>
                @endif
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @if ($errors->has('email'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div>
                <label for="phone" class="block text-gray-700 font-medium">Nomor Telepon</label>
                <input type="text" name="phone" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @if ($errors->has('phone'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('phone') }}</p>
                @endif
            </div>

            <button type="submit"
                class="w-full py-3 bg-[#FBA518] text-white rounded-lg hover:bg-[#E59400] transition">Simpan</button>
        </form>
    </div>
</x-app>
