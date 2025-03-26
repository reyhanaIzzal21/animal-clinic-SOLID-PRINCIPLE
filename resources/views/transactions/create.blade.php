<x-app>
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-xl rounded-lg">
        <h2 class="text-2xl font-semibold text-[#FBA518] mb-6 text-center">Buat Transaksi</h2>

        <form action="{{ route('transactions.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Doctor Selection -->
            <div>
                <label for="doctor_id" class="block text-gray-700 font-medium">Pilih Dokter</label>
                <select name="doctor_id" id="doctor_id"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]">
                    <option value="">Pilih Dokter</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('doctor_id')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Customer Selection -->
            <div>
                <label for="customer_id" class="block text-gray-700 font-medium">Pilih Customer</label>
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

            <!-- Pet Selection (dynamically loaded based on selected customer) -->
            <div>
                <label for="pets" class="block text-gray-700 font-medium">Pilih Hewan</label>
                <select name="pets[]" id="pets"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]"
                    multiple >
                    <!-- Pets will be loaded dynamically based on customer selection -->
                </select>
                @error('pets')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Service Selection -->
            <div>
                <label for="services" class="block text-gray-700 font-medium">Pilih Layanan</label>
                <select name="services[]" id="services"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518]"
                    multiple>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }} -
                            Rp{{ number_format($service->price, 0, ',', '.') }}</option>
                    @endforeach
                </select>
                @error('services')
                    <p class="text-red-500 italic text-xs">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('transactions.index') }}"
                    class="px-5 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-3 bg-[#FBA518] text-white rounded-lg hover:bg-yellow-600 transition">
                    Buat Transaksi
                </button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customer_id').change(function() {
                let customerId = $(this).val();
                if (customerId) {
                    $.ajax({
                        url: `/customers/${customerId}/pets`,
                        type: 'GET',
                        success: function(data) {
                            console.log(data); // Debug: Lihat data di console browser
                            $('#pets').empty();
                            if (data.length > 0) {
                                $.each(data, function(key, pet) {
                                    $('#pets').append('<option value="' + pet.id +
                                        '">' + pet.name + '</option>');
                                });
                            } else {
                                $('#pets').append(
                                    '<option value="">No pets available</option>');
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText); // Debug error
                        }
                    });
                } else {
                    $('#pets').empty();
                }
            });
        });
    </script>
</x-app>
