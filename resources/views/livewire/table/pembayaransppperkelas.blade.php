{{-- Table Data --}}
<div>
    <x-data-table-spp :data="$data" :model="$pembayaransppperkelass">
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
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pembayaransppperkelass as $key => $siswa)
                <tr x-data="window.__controller.dataTableController({{ $siswa->id }})">
                    <td>{{ $pembayaransppperkelass->firstItem() + $key }}</td>
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
                            <td>{{ $jml }}</td>
                        @else
                            <td>0</td>
                        @endif
                    @endforeach
                    {{-- <td>Rp. {{ number_format($jml, 0, ".", ".") . ",-" }}</td> --}}
                </tr>
            @endforeach
        </x-slot>
    </x-data-table-spp>
</div>