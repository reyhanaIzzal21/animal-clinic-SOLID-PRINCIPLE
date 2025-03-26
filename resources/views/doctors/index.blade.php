<x-app>
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto p-6">
            <!-- Header Section with Search -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                <h1 class="text-2xl font-semibold text-[#FBA518]">Daftar Dokter</h1>

                <div class="flex gap-4 w-full md:w-auto">
                    <!-- Search Input -->
                    {{-- <div class="relative flex-1 md:flex-initial">
                        <input type="text" name="search" placeholder="Cari dokter..."
                            class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FBA518] focus:border-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div> --}}

                    <!-- Add Doctor Button -->
                    <a href="{{ route('doctors.create') }}"
                        class="px-4 py-2 bg-[#FBA518] text-white rounded-lg shadow-lg hover:bg-[#d98e0f] focus:outline-none focus:ring-2 focus:ring-[#FBA518] transition-all duration-300 flex items-center gap-2">
                        <span>Tambah Dokter</span>
                    </a>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-[#FBA518] text-white">
                            <tr>
                                <th class="py-4 px-6 text-left">Nama</th>
                                <th class="py-4 px-6 text-left hidden md:table-cell">Spesialisasi</th>
                                <th class="py-4 px-6 text-left hidden sm:table-cell">Telepon</th>
                                <th class="py-4 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($doctors as $doctor)
                                <tr class="hover:bg-gray-50 transition-all duration-200">
                                    <td class="py-4 px-6 font-medium">{{ $doctor->name }}</td>
                                    <td class="py-4 px-6 hidden md:table-cell">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                            {{ $doctor->specialization }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 hidden sm:table-cell">
                                        <a href="tel:{{ $doctor->phone }}" class="text-gray-600 hover:text-[#FBA518]">
                                            {{ $doctor->phone }}
                                        </a>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex justify-center gap-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('doctors.edit', $doctor->id) }}"
                                                class="p-2 bg-[#FBA518] text-white rounded-lg hover:bg-[#d98e0f] transition-all duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <button type="button" data-modal-target="deleteModal-{{ $doctor->id }}"
                                                data-modal-toggle="deleteModal-{{ $doctor->id }}"
                                                class="p-2 bg-[#E52020] text-white rounded-lg hover:bg-red-700 transition-all duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path d="M3 6h18"></path>
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                </svg>
                                            </button>

                                            <!-- Delete Button with Confirmation -->
                                            {{-- <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokter ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 bg-[#E52020] text-white rounded-lg hover:bg-red-700 transition-all duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path d="M3 6h18"></path>
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                    </svg>
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete modal -->
    @foreach ($doctors as $doctor)
        <div id="deleteModal-{{ $doctor->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-50 sm:p-5">
                    <button type="button"
                        class="text-gray-700 absolute top-2.5 right-2.5 bg-transparent hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  dark:hover:text-gray-900"
                        data-modal-toggle="deleteModal-{{ $doctor->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <svg class="text-gray-400 dark:text-red-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mb-4 text-gray-500 dark:text-gray-800">Apakah Anda Yakin?</p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="deleteModal-{{ $doctor->id }}" type="button"
                            class="flex items-center px-4 py-2 font-semibold bg-gray-600 text-white rounded-2xl focus:outline-none focus:ring-2">Batal</button>
                        <!-- Delete Button -->
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="p-2 bg-[#E52020] text-white rounded-lg hover:bg-red-700 transition-all duration-300">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
