<div class="card card-body shadow-dark">
    <div class="w-full py-2 mx-auto mb-2 md:flex max-w-7xl sm:px-6 lg:px-8">
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                Pemasukan SPP untuk Bulan :
                </label>
                <select wire:model='pilihbulan' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value="">Pilih Bulan</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                </select>
        </div>
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                tahun ajaran :
                </label>
                <select wire:model='tahun' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value="">Pilih Tahun Ajaran</option>
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
                            Total Pemasukan SPP untuk : {{ $bulan }} T.A. {{ $tahun }}
                        </div>
                        <div class="text-xl font-bold">
                            Rp. {{ number_format($saldospp, 0, ".", ".") . ",-" }}
                        </div>
                    </div>
                    <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- component -->
    <div class="flex items-center">
        <div class="w-full py-1 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                keuangan di bulan : 
                </label>
            <div class="flex flex-col w-full mb-2 space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0 lg:mb-4">
                <div class="w-full lg:w-1/3">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-warning widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                    pemasukan spp di bulan : {{ $nowm }}
                                </div>
                                <div class="text-xl font-bold">
                                    Rp. {{ number_format($saldomasuk, 0, ".", ".") . ",-" }}
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-warning widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                seragam, gedung, a. praktek
                                </div>
                                <div class="text-xl font-bold">
                                    Rp. {{ number_format($saldomasuknon, 0, ".", ".") . ",-" }}
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-warning widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                total pemasukan di bulan : {{ $nowm }}
                                </div>
                                <div class="text-xl font-bold">
                                    Rp. {{ number_format($totalpemasukan, 0, ".", ".") . ",-" }}
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center">
        <div class="w-full py-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col w-full mb-2 space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0 lg:mb-4">
                <div class="w-full lg:w-1/3">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-warning widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                    pengeluaran spp di bulan : {{ $nowm }}
                                </div>
                                <div class="text-xl font-bold">
                                    Rp. {{ number_format($pengeluaran, 0, ".", ".") . ",-" }}
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/3">
                    <div class="w-full p-4 bg-white border border-gray-100 rounded-lg shadow-warning widget dark:bg-gray-900 dark:border-gray-800">
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-col">
                                <div class="text-xs font-light text-gray-500 uppercase">
                                sisa saldo di bulan : {{ $nowm }}
                                </div>
                                <div class="text-xl font-bold">
                                    Rp. {{ number_format($sisasaldo, 0, ".", ".") . ",-" }}
                                </div>
                            </div>
                            <svg class="text-gray-500 stroke-current" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full py-2 mx-auto mb-2 md:flex max-w-7xl sm:px-6 lg:px-8">
        <div class="px-3 mb-6 md:w-1/3 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state" >
                Tanggal
                </label>
                <div class="flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                    <input wire:model.debounce.200ms='tanggalmulai' type="date" class="w-full px-1 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline">
                </div>
        </div>
        <div class="px-3 mb-6 md:w-1/3 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                Sampai dengan
                </label>
                <div class="flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                    <input wire:model.debounce.200ms='tanggalakhir' type="date" class="w-full px-1 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline">
                </div>
        </div>
        <div class="px-3 md:w-1/3">
            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-state">
                pilih laporan
                </label>
                <select wire:model='pilihlaporan'  class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value=""> Pilih Laporan </option>
                    <option value="SPP"> Pemasukan SPP </option>
                    <option value="Non-SPP"> Seragam, Uang Gedung, A. Praktek </option>
                    <option value="Pengeluaran"> Pengeluaran </option>
                </select>
        </div>
    </div>
    @if ($isPemasukan)
    @include('livewire.modal.tabel-pemasukan')
    @endif 
    @if ($isPengeluaran)
    @include('livewire.modal.tabel-pengeluaran')
    @endif 
    
</div>
