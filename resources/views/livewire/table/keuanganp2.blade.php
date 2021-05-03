<div>
    <x-data-table-p2 :data="$data" :model="$keuanganp2s">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    #
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
                <th><a wire:click.prevent="sortBy('jumlahbayar')" role="button" href="#">
                    Jumlah Bayar
                    @include('components.sort-icon', ['field' => 'jumlahbayar'])
                </a></th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($keuanganp2s as $key => $keuanganp)
                <tr x-data="window.__controller.dataTableController({{ $keuanganp->id }})">
                    <td>{{ $keuanganp2s->firstItem() + $key }}</td>
                    <td>{{ $keuanganp->tanggal }}</td>
                    <td>{{ $keuanganp->nama }}</td>
                    <td>{{ $keuanganp->tingkat }} - {{ $keuanganp->jurusan }}</td>
                    <td>{{ $keuanganp->gunabayar }}</td>
                    <td>{{ $keuanganp->jumlahbayar }}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table-p2>
</div>
