<div class="card card-body shadow-dark">
    <div class="w-full py-2 mx-auto mb-2 md:flex max-w-7xl sm:px-6 lg:px-8">
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                Pemasukan untuk guna bayar 
                </label>
                <select wire:model='pilihgunane' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value=""> Guna Bayar</option>
                    @foreach ($gunane as $g)
                        <option value="{{ $g->id }}"> {{  $g->gunabayar }}</option>
                    @endforeach
                </select>
        </div>
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                tahun ajaran 
                </label>
                <select wire:model='tahun' class="w-full px-2 py-2 border rounded shadow appearance-non">
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
                            Total Pembayaran {{ $gunabayare }} T.A. {{ $tahun }}
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
    <div class="w-full py-2 mx-auto mb-2 md:flex max-w-7xl sm:px-6 lg:px-8">
        <div class="px-3 md:w-1/4">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                pilih laporan
                </label>
                <select wire:model='pilihlaporan'  class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value=""> Pilih Laporan </option>
                    @foreach ($gunane as $g)
                        <option value="{{ $g->id }}"> {{ $g->gunabayar }}</option>
                    @endforeach
                </select>
        </div>
        <div class="px-3 md:w-1/4">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                pilih tahun
                </label>
                <select wire:model='pilihtahun'  class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value=""> Pilih Laporan </option>
                    @foreach ($tahuns as $g)
                        <option value="{{ $g->tahun }}"> {{ $g->tahun }}</option>
                    @endforeach
                </select>
        </div>
    </div>
    @if ($isPemasukan)
    @include('livewire.modal.tabel-pemasukanp')
    @endif 
</div>
