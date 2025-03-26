<x-app>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-xl rounded-lg">
        <h1 class="text-3xl font-semibold text-[#FBA518] mb-6 text-center">Detail Transaksi</h1>

        <div class="space-y-6">
            <!-- Customer and Doctor Information -->
            <div class="space-y-2">
                <p class="text-lg"><strong>Customer:</strong> {{ $transaction->customer->name }} </p>
                <p class="text-lg"><strong>Dokter:</strong> {{ $transaction->doctor->name }}</p>
            </div>

            <!-- Pets List -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Hewan:</h3>
                <ul class="space-y-1">
                    @foreach ($transaction->pets as $pet)
                        <li class="text-lg text-gray-700">{{ $pet->name }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Services List -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Services:</h3>
                <ul class="space-y-1">
                    @foreach ($transaction->services as $service)
                        <li class="text-lg text-gray-700">{{ $service->name }} -
                            Rp{{ number_format($service->price, 0, ',', '.') }}</li>
                    @endforeach
                </ul>
            </div>

            <hr>
            <!-- Total Price -->
            <p class="text-xl font-semibold"><strong>Total Harga:</strong>
                Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</p>
        </div>

        <div class="flex justify-end gap-4">
            <div class="flex justify-end mt-6">
                <a href="{{ route('transactions.index') }}"
                    class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Kembali</a>
            </div>
            @if ($transaction->status == 'pending')
                <div class="flex justify-end mt-6">
                    <button id="markCompletedBtn"
                        class="px-6 py-3 bg-[#FBA518] text-white rounded-lg hover:bg-yellow-600 transition">Selesai</button>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal for Confirmation -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-1/3">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Apakah Anda Yakin?</h3>
            <p class="text-gray-700 mb-6">Anda ingin menandai transaksi ini sebagai selesai?</p>
            <div class="flex justify-end gap-x-4">
                <button id="cancelBtn"
                    class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Batal</button>
                <form
                    action="{{ route('transactions.updateStatus', ['id' => $transaction->id, 'status' => 'completed']) }}"
                    method="POST">
                    @csrf
                    <button type="submit"
                        class="px-6 py-3 bg-[#FBA518] text-white rounded-lg hover:bg-yellow-600 transition">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal toggle script
        const markCompletedBtn = document.getElementById('markCompletedBtn');
        const confirmationModal = document.getElementById('confirmationModal');
        const cancelBtn = document.getElementById('cancelBtn');

        markCompletedBtn.addEventListener('click', function() {
            confirmationModal.classList.remove('hidden');
        });

        cancelBtn.addEventListener('click', function() {
            confirmationModal.classList.add('hidden');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if (session('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}",
                color: "#fff",
                background: "#FBA518",
            });
        @elseif (session('error'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}",
                color: "#ff0000",
                background: "#FFD9D9",
            });
        @endif
    </script>
</x-app>
