<x-app>
    <div class="max-w-lg mx-auto p-6 bg-white shadow-xl rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Tambah Hewan Peliharaan</h2>
        <form action="{{ route('pets.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="customer_id" class="block text-gray-700 font-medium">Customer</label>
                <select name="customer_id" id="customer_id"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                    <option value="">Pilih Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Nama Hewan</label>
                <input type="text" name="name"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('name')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Spesies</label>
                <input type="text" name="species"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('species')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Umur</label>
                <input type="number" name="age"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('age')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 bg-[#FBA518] text-white rounded-lg hover:bg-[#E59400] transition">Simpan</button>
        </form>
    </div>
</x-app>
