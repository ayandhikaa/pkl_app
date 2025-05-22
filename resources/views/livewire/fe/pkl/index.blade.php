{{-- 
    @if (session()->has('error'))
        <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-initial="setTimeout(() => show = false, 5000)">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-initial="setTimeout(() => show = false, 5000)">
            {{ session('success') }}
        </div>
    @endif --}}
    
    <div class="py-12">
        <div class="container mx-auto px-2 ">
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
                <div class="bg-white p-4 col-span-6 rounded-lg shadow dark:bg-gray-800">
                    <!-- Konten Kolom 1 -->
                    <h2 class="text-xl font-semibold mb-2 ">Riwayat Pengajuan</h2>

                    <div class="container mx-auto ">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-4">
                        
                        <!-- Kolom Search -->
                            <div class="w-full md:w-1/2">
                                <input
                                type="text"
                                placeholder="Cari data..."
                                wire:model="search"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                />
                            </div>
                    
                        <!-- Button Tambah Data -->
                            <div class="w-full md:w-auto text-right">
                                <button wire:click="create()"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200"
                                >
                                + Tambah Data
                                </button>
                            </div>

                            <!-- Modal -->
                            @if($isOpen)
                                @include('livewire.fe.pkl.create')
                            @endif

                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white dark:bg-gray-800">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs uppercase text-white bg-blue-600 dark:bg-gray-700 dark:text-gray-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Industri</th>
                                        <th scope="col" class="px-6 py-3">Guru Pembimbing</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        use Carbon\Carbon;
                                        $no = 0;
                                    @endphp

                                    @foreach ($pkls as $key => $pkl)
                                        @php
                                            $no++;

                                            $d1 = Carbon::parse($pkl->tanggal_mulai);
                                            $d2 = Carbon::parse($pkl->tanggal_selesai);

                                            $selisihHari = $d1->diffInDays($d2);
                                        @endphp
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $pkl->siswa->nama }}
                                            </th>
                                            <td class="px-6 py-4">{{ $pkl->industri->nama }}</td>
                                            <td class="px-6 py-4">{{ $pkl->guru->nama }}</td>
                                            <td class="px-6 py-4">{{ Carbon::parse($pkl->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                                            <td class="px-6 py-4">{{ Carbon::parse($pkl->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                                        </tr>                           
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- paginate --}}
                                <div class="p-4">
                                    {{ $pkls->links() }}
                                </div>
                        </div>
                                                 
                    </div>
              </div>
            </div>
          </div>
          
    </div>
