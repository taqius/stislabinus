<div>
    <x-data-table :data="$data" :model="$pembayarans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tanggalbayar')" role="button" href="#">
                    Tanggal Bayar
                    @include('components.sort-icon', ['field' => 'tanggalbayar'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'nama'])
                </a></th>
                <th><a wire:click.prevent="sortBy('idkelas')" role="button" href="#">
                    Kelas
                    @include('components.sort-icon', ['field' => 'idkelas'])
                </a></th>
                <th><a wire:click.prevent="sortBy('gunabayar')" role="button" href="#">
                    Guna Bayar
                    @include('components.sort-icon', ['field' => 'gunabayar'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tahun')" role="button" href="#">
                    Tahun
                    @include('components.sort-icon', ['field' => 'tahun'])
                </a></th>
                <th><a wire:click.prevent="sortBy('jumlahbayar')" role="button" href="#">
                    Jumlah Bayar
                    @include('components.sort-icon', ['field' => 'jumlahbayar'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pembayarans as $key => $pembayaran)
                <tr x-data="window.__controller.dataTableController({{ $pembayaran->id }})">
                    <td>{{ $pembayarans->firstItem() + $key }}</td>
                    <td>{{ $pembayaran->tanggal }}</td>
                    <td>{{ $pembayaran->nama }}</td>
                    <td>{{ $pembayaran->tingkat }}-{{ $pembayaran->jurusan }}</td>
                    <td>{{ $pembayaran->gunabayar }}</td>
                    <td>{{ $pembayaran->tahun }}</td>
                    <td>Rp. {{ number_format($pembayaran->jumlahbayar, 0, ".", ".") . ",-" }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" wire:click="edit({{ $pembayaran->id }})" class="mr-3"><i class="fas fa-edit"></i></i></a>
                        <a role="button" target="_blank" href="{{ route($printtu,$pembayaran->id) }}" class="mr-3"><i class="fas fa-print"></i></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @if ($isOpen)
    @include('livewire.modal.modal-pembayaranp')
    @endif  
</div>
