<div>
    <h1>Daftar Industri PKL</h1>

    <input type="text" wire:model="search" placeholder="Cari industri...">

    <ul>
        @foreach ($industris as $industri)
            <li>{{ $industri->nama }} - {{ $industri->bidang_usaha }}</li>
        @endforeach
    </ul>

    {{ $industris->links() }}
</div>
