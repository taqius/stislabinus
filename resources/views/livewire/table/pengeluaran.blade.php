<div>
    <x-data-table :data="$data" :model="$pengeluarans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tanggalsimpan')" role="button" href="#">
                    Tanggal Simpan
                    @include('components.sort-icon', ['field' => 'tanggalsimpan'])
                </a></th>
                <th><a wire:click.prevent="sortBy('keterangan')" role="button" href="#">
                    Keterangan
                    @include('components.sort-icon', ['field' => 'keterangan'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tanggalnota')" role="button" href="#">
                    Tanggal Nota
                    @include('components.sort-icon', ['field' => 'tanggalnota'])
                </a></th>
                <th><a wire:click.prevent="sortBy('jumlahbayar')" role="button" href="#">
                    Jumlah Bayar
                    @include('components.sort-icon', ['field' => 'jumlahbayar'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pengeluarans as $key => $pengeluaran)
                <tr x-data="window.__controller.dataTableController({{ $pengeluaran->id }})">
                    <td>{{ $pengeluarans->firstItem() + $key }}</td>
                    <td>{{ $pengeluaran->tanggals }}</td>
                    <td>{{ $pengeluaran->keterangan }}</td>
                    <td>{{ $pengeluaran->tanggaln }}</td>
                    <td>Rp. {{ number_format($pengeluaran->jumlahbayar, 0, ".", ".") . ",-" }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" wire:click="edit({{ $pengeluaran->id }})" class="mr-3"><i class="fas fa-edit"></i></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @if ($isOpen)
    @include('livewire.modal.modal-pengeluaran')
    @endif  
</div>
