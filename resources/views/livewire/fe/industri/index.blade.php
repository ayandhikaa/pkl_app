<div class="p-4 bg-white rounded-2xl shadow space-y-4 dark:bg-gray-800">
    {{-- Header: Search & Tambah --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Cari Industri..."
            class="w-full sm:w-1/2 px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
        >

        <button wire:click="create()"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
        >
            + Tambah Industri
        </button>

        @if($isOpen)
            @include('livewire.fe.industri.create')
        @endif
    </div>

    {{-- Grid Card Industri --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @php
            use Carbon\Carbon;
            $no = 0;
        @endphp
        {{-- Card Industri --}}
        @foreach($industris as $key => $industri)
        <div class="flex flex-col sm:flex-row bg-gray-100 rounded-xl overflow-hidden shadow-sm dark:bg-gray-700">
            <div class="sm:w-1/3 w-full">
                <img
                    src="{{ $industri->foto ? asset('storage/' . $industri->foto) : asset('images/industri-placeholder.png') }}"
                    alt="Foto Industri"
                    class="object-cover w-full h-full"
                >
            </div>
            <div class="sm:w-2/3 w-full p-4 space-y-2">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $industri->nama }}</h2>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Bidang Usaha: {{ $industri->bidang_usaha }}</p>
                <p class="text-gray-500 dark:text-gray-300 text-sm">Alamat: {{ $industri->alamat }}</p>
                <p class="text-gray-500 dark:text-gray-300 text-sm">Kontak: {{ $industri->kontak }} | {{ $industri->email }} | {{ $industri->website }}</p>
            </div>
        </div>
        @endforeach
    </div>
    {{-- pagination --}}
    <div class="p-4">
        {{ $industris->links() }}
    </div>
</div>
