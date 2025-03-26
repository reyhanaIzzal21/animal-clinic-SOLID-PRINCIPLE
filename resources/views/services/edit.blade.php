<x-app>
    <div class="max-w-lg mx-auto p-6 bg-white shadow-xl rounded-lg">
        <h2 class="text-2xl font-semibold text-[#FBA518] mb-6 text-center">Edit Service</h2>
        <form action="{{ route('services.update', $service->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-medium">Nama Service</label>
                <input type="text" name="name" value="{{ $service->name }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('name')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-medium">Deskripsi</label>
                <textarea name="description"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">{{ $service->description }}</textarea>
                @error('description')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-medium">Harga</label>
                <input type="number" step="0.01" name="price" value="{{ $service->price }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('price')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('services.index') }}"
                    class="px-5 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-3 bg-[#FBA518] text-white rounded-lg hover:bg-[#E59400] transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-app>
