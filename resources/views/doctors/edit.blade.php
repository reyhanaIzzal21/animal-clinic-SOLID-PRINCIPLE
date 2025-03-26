<x-app>
    <div class="max-w-lg mx-auto p-6 bg-white shadow-xl rounded-lg">
        <h2 class="text-2xl font-semibold text-[#FBA518] mb-6 text-center">Edit Dokter</h2>
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-medium">Nama</label>
                <input type="text" name="name" value="{{ $doctor->name }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('name')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="specialization" class="block text-gray-700 font-medium">Spesialisasi</label>
                <input type="text" name="specialization" value="{{ $doctor->specialization }}" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('specialization')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-gray-700 font-medium">Telepon</label>
                <input type="text" name="phone" value="{{ $doctor->phone }}" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                @error('phone')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('doctors.index') }}"
                    class="px-5 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-3 bg-[#FBA518] text-white rounded-lg hover:bg-[#E59400] transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app>
