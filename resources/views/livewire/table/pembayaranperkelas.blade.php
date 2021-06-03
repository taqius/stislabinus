{{-- Table Data --}}
<div>
    <x-data-table-p2 :data="$data" :model="$pembayaranperkelass">
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
                <th>
                    Kelas
                </a></th>
                <th>
                    Tanggal Bayar
                </a></th>
                <th>
                    Guna Bayar
                </a></th>
                <th>
                    Jumlah Bayar
                </a></th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pembayaranperkelass as $key => $siswa)
                <tr x-data="window.__controller.dataTableController({{ $siswa->id }})">
                    <td>{{ $pembayaranperkelass->firstItem() + $key }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->tingkat }} - {{ $siswa->jurusan }}</td>
                    @php
                        $jml = App\Models\Pembayaran::
                        where('idsiswa',$siswa->id)
                        ->where('idgunabayar',$this->sortGunabayar)
                        ->sum('jumlahbayar');
                        $tgl = App\Models\Pembayaran::
                        where('idsiswa',$siswa->id)
                        ->where('idgunabayar',$this->sortGunabayar)
                        ->select('tanggalbayar as tanggal')
                        ->value('tanggal');
                        $gnbyr = App\Models\Pembayaran::
                        join('gunabayar', 'gunabayar.id', '=', 'pembayaran.idgunabayar')
                        ->where('pembayaran.idgunabayar',$this->sortGunabayar)
                        ->select('gunabayar.gunabayar as gunabayar')
                        ->value('gunabayar');
                    @endphp
                    <td>{{ $tgl }}</td>
                    <td>{{ $gnbyr }}</td>
                    <td>Rp. {{ number_format($jml, 0, ".", ".") . ",-" }}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table-p2>
</div>