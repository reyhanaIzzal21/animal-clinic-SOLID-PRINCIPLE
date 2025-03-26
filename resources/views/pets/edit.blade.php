<x-app>
    <div class="flex items-center justify-center">
        <div class="w-full max-w-2xl bg-gray-100 shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 border-b pb-3">Edit Hewan</h2>
            <form action="{{ route('pets.update', $pet->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Pemilik Hewan</label>
                    <select name="customer_id"
                        class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $pet->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Nama Hewan</label>
                    <input type="text" name="name" value="{{ $pet->name }}"
                        class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                    @error('name')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Spesies</label>
                    <input type="text" name="species" value="{{ $pet->species }}"
                        class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                    @error('species')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Umur</label>
                    <input type="number" name="age" value="{{ $pet->age }}"
                        class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                    @error('age')
                        <p class="text-red-500 italic text-xs">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('pets.index') }}"
                        class="px-4 py-2 text-white bg-gray-500 rounded-lg hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-[#FBA518] rounded-lg hover:bg-yellow-600 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app>
