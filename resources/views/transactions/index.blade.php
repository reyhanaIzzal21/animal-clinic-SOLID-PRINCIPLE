<x-app>
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto p-6">
            <!-- Header Section with Search -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                <h1 class="text-2xl font-semibold text-[#FBA518]">Daftar Transaksi</h1>

                <div class="flex gap-4 w-full md:w-auto">
                    <!-- Search Input -->
                    {{-- <div class="relative flex-1 md:flex-initial">
                        <input type="text" name="search" placeholder="Cari transaksi..."
                            class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518] focus:border-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div> --}}

                    <!-- Create Transaction Button -->
                    <a href="{{ route('transactions.create') }}"
                        class="px-4 py-2 bg-[#FBA518] text-white rounded-lg shadow-lg hover:bg-[#d98e0f] focus:outline-none focus:ring-2 focus:ring-[#FBA518] transition-all duration-300 flex items-center gap-2">
                        <span>Buat Transaksi</span>
                    </a>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-[#FBA518] text-white">
                            <tr>
                                <th class="py-4 px-6 text-left hidden lg:table-cell">Dokter</th>
                                <th class="py-4 px-6 text-left hidden md:table-cell">Customer</th>
                                <th class="py-4 px-6 text-right">Total</th>
                                <th class="py-4 px-6 text-center">Status</th>
                                <th class="py-4 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($transactions as $transaction)
                                <tr class="hover:bg-gray-50 transition-all duration-200">
                                    <td class="py-4 px-6 hidden lg:table-cell">{{ $transaction->doctor->name }}</td>
                                    <td class="py-4 px-6 hidden md:table-cell">{{ $transaction->customer->name }}</td>
                                    <td class="py-4 px-6 text-right font-medium">
                                        Rp{{ number_format($transaction->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex justify-center">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                                    'completed' => 'bg-green-100 text-green-800',
                                                    'cancelled' => 'bg-red-100 text-red-800',
                                                    'processing' => 'bg-blue-100 text-blue-800',
                                                ];
                                                $statusColor =
                                                    $statusColors[$transaction->status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="px-3 py-1 rounded-full text-sm {{ $statusColor }}">
                                                {{ ucfirst($transaction->status) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex justify-center">
                                            <a href="{{ route('transactions.show', $transaction->id) }}"
                                                class="px-4 py-2 bg-[#FBA518] text-white rounded-lg hover:bg-[#d98e0f] transition-all duration-300 flex items-center gap-2 text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path
                                                        d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                Kelola
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center py-12">
                                        <p class="text-gray-700 text-sm">Tidak ada transaksi.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            {{-- <div class="mt-6">
                {{ $transactions->links() }}
            </div> --}}
        </div>
    </div>

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
