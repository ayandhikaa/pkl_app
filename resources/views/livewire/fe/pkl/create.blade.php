<div
    x-data="{ isOpen: @entangle('isOpen') }"
    x-show="isOpen"
    class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
    style="display: none;"
>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6 relative text-gray-900 dark:text-gray-100">
        
        {{-- Tombol close --}}
        <button
            @click="isOpen = false"
            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white"
            aria-label="Close modal"
        >
            &#10006;
        </button>

        {{-- Session Alerts --}}
        @if(session()->has('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="store" class="space-y-4">
            <div>
                <label for="nama" class="block text-sm font-medium">Nama</label>
                <select
                    wire:model="siswa_id"
                    id="nama"
                    class="mt-1 p-3 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                >
                    <option value="">Pilih Siswa</option>
                    @if($siswa_login)
                        <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
                    @endif
                </select>
                @error('siswa_id') <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="industri" class="block text-sm font-medium">Industri</label>
                <select
                    wire:model="industri_id"
                    id="industri"
                    class="mt-1 p-3 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                >
                    <option value="">Pilih Industri</option>
                    @foreach ($industris as $industri)
                        <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                    @endforeach
                </select>
                @error('industri_id') <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="guru" class="block text-sm font-medium">Guru Pembimbing</label>
                <select
                    wire:model="guru_id"
                    id="guru"
                    class="mt-1 p-3 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                >
                    <option value="">Pilih Guru Pembimbing</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
                @error('guru_id') <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="mulai" class="block text-sm font-medium">Tanggal Mulai</label>
                <input
                    type="date"
                    wire:model="mulai"
                    id="mulai"
                    class="mt-1 p-3 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                />
                @error('mulai') <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="selesai" class="block text-sm font-medium">Tanggal Selesai</label>
                <input
                    type="date"
                    wire:model="selesai"
                    id="selesai"
                    class="mt-1 p-3 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                />
                @error('selesai') <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 dark:hover:bg-blue-500"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
