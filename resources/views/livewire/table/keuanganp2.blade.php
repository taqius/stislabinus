<div class="card card-body shadow-dark">
    <div class="w-full py-2 mx-auto mb-2 md:flex max-w-7xl sm:px-6 lg:px-8">
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                Pemasukan untuk guna bayar 
                </label>
                <select wire:model='pilihgunane' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value=""> Guna Bayar</option>
                    @foreach ($gunans as $g)
                        <option value="{{ $g->id }}"> {{  $g->gunabayar }}</option>
                    @endforeach
                </select>
        </div>
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                tahun ajaran 
                </label>
                <select wire:model='pilihtahun' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value="">Tahun Ajaran</option>
                    @foreach ($tahuns as $t)
                    <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                    @endforeach
                </select>
        </div>
        <div class="w-full px-1 lg:w-1/2">
            <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-warning widget dark:bg-gray-900 dark:border-gray-800">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs font-light text-gray-500 uppercase">
                            Total Pembayaran {{ $gunabayare }} T.A. {{ $pilihtahun }}
                        </div>
                        <div class="text-xl font-bold">
                            Rp. {{ number_format($saldogunane, 0, ".", ".") . ",-" }}
                        </div>
                    </div>
                    <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
{{-- Table Data --}}
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
                    <td>Rp. {{ number_format($keuanganp->jumlahbayar, 0, ".", ".") . ",-" }}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table-p2>
</div>
