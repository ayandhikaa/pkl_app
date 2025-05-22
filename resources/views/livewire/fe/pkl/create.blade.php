<div id="modalTambahpkl" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Form Tambah Data</h2>
        <form>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-200" for="nama">Nama</label>
                <select wire:model="siswa_id" value="{{ $siswa_login->id }}" id="nama" name="nama"
                    class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:ring focus:ring-blue-200">
                    <option value="">Pilih Nama</option>
                    <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
                </select>
                @error('siswa_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-200" for="industri">Industri</label>
                <select wire:wire:model="industri_id" id="industri" name="industri"
                    class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:ring focus:ring-blue-200">
                    <option value="">Pilih Industri</option>
                    @foreach ($industris as $industri)
                        <option value="{{ $industri->id }}">{{ $industri->nama }}</option>  
                    @endforeach
                </select>
                @error('industri_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-200" for="industri">Industri</label>
                <select wire:wire:model="industri_id" id="industri" name="industri"
                    class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:ring focus:ring-blue-200">
                    <option value="">Pilih Guru Pembimbing</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>  
                    @endforeach
                </select>
                @error('guru_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-200" for="mulai">Tanggal Mulai</label>
                <input type="date" id="start-date" name="start-date" wire:model="mulai"
                    class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:ring focus:ring-blue-200">

                @error('mulai')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-200" for="selesai">Tanggal Selesai</label>
                <input wire:model="selesai" type="date" id="end-date" name="end-date"
                    class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:ring focus:ring-blue-200">
                @error('selesai')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button wire:click="closeModal()" type="button" onclick="document.getElementById('modalTambahpkl').classList.add('hidden')"
                    class="px-4 py-2 bg-gray-300 dark:bg-gray-700 text-black dark:text-white rounded mr-2">Batal</button>
                <button  wire:click.prevent="store()" type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 dark:hover:bg-blue-500">Simpan</button>
            </div>
        </form>
    </div>
</div>