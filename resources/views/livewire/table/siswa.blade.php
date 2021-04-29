<div>
    <x-data-table-siswa :data="$data" :model="$siswas">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('nis')" role="button" href="#">
                    NIS
                    @include('components.sort-icon', ['field' => 'nis'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'nama'])
                </a></th>
                <th><a wire:click.prevent="sortBy('idkelas')" role="button" href="#">
                    Kelas
                    @include('components.sort-icon', ['field' => 'idkelas'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tahun')" role="button" href="#">
                    Tahun
                    @include('components.sort-icon', ['field' => 'tahun'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($siswas as $siswa)
                <tr x-data="window.__controller.dataTableController({{ $siswa->id }})">
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->tingkat }} - {{ $siswa->jurusan }}</td>
                    <td>{{ $siswa->tahun }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" wire:click="edit({{ $siswa->id }})" class="mr-3"><i class="fas fa-edit"></i></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table-siswa>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @if ($isOpen)
    @include('livewire.modal.modal-siswa')
    @endif  
</div>
