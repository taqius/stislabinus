{{-- Table Data --}}
<div>
    <select wire:model="sortSiswa" class="form-control">
        <option value=""> Siswa </option>
        @foreach ($siswane as $k)
        <option value="{{ $k->id }}"> {{ $k->nama}}</option>
        @endforeach
    </select>
    <x-data-table-spp :data="$data" :model="$cetakpdfs">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    #
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama')" role="button" href="#">
                    Nama
                    @include('components.sort-icon', ['field' => 'nama'])
                </a></th>
                <th>Kelas</th>
                @foreach ($gunans as $g)
                <th>{{ $g->gunabayar }}</th>
                @endforeach
                @foreach ($gunans2 as $g)
                <th>{{ $g->gunabayar }}</th>
                @endforeach
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($cetakpdfs as $key => $siswa)
                <tr x-data="window.__controller.dataTableController({{ $siswa->id }})">
                    <td>{{ $cetakpdfs->firstItem() + $key }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->tingkat }} - {{ $siswa->jurusan }}</td>
                    @foreach ($gunans as $g)
                        @php
                        $jml = App\Models\Pembayaran::
                        where('idsiswa',$siswa->id)
                        ->where('idgunabayar',$g->id)
                        ->sum('jumlahbayar');
                        @endphp
                        @if (!empty($jml))
                        <td>Rp. {{ number_format($jml, 0, ".", ".") . ",-" }}</td>
                        @else
                        <td>Rp. {{ number_format(0, 0, ".", ".") . ",-" }}</td>
                        @endif
                    @endforeach
                    @foreach ($gunans2 as $g)
                        @php
                        $jml = App\Models\Pembayaran::
                        where('nis',$siswa->nis)
                        ->where('idgunabayar',$g->id)
                        ->sum('jumlahbayar');
                        @endphp
                        @if (!empty($jml))
                        <td>Rp. {{ number_format($jml, 0, ".", ".") . ",-" }}</td>
                        @else
                        <td>Rp. {{ number_format(0, 0, ".", ".") . ",-" }}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </x-slot>
    </x-data-table-spp>
</div>