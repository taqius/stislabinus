{{-- Table Data --}}
<div>
    <x-data-table-spp :data="$data" :model="$cetakpdfs">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    #
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nis')" role="button" href="#">
                    NIS
                    @include('components.sort-icon', ['field' => 'nis'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'nama'])
                </a></th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($cetakpdfs as $key => $siswa)
                <tr x-data="window.__controller.dataTableController({{ $siswa->id }})">
                    <td>{{ $cetakpdfs->firstItem() + $key }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->tingkat }} - {{ $siswa->jurusan }}</td>
                    <td><a role="button" wire:click="cetak({{ $siswa->id }})" class="mr-3"><i class="fas fa-edit"></i></i></a></td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table-spp>
</div>