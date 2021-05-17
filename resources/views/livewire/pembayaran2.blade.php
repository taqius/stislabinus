<div class="card card-body shadow-dark">
    <!-- component -->
    <form>
    <div class="flex items-center">
        <div class="w-full py-1 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col w-full mb-2 space-y-2 lg:flex-row lg:space-x-2 lg:space-y-0 lg:mb-4">
                <div class="w-full my-2 lg:w-1/2">
                    <div class="flex items-center justify-between">
                        <div class="relative flex flex-col w-1/2 mx-1 text-center">
                            @error('tanggalbayar')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <input wire:model='tanggalbayar' type="date" id="tanggalbayar" class="w-full px-1 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline"/>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="relative flex flex-col w-1/2 mx-1 text-center">
                            @error('idkelas')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div class="relative flex flex-col w-1/2 mx-1 text-center">
                            @error('tahun')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <select wire:model='idkelas' class="block w-full px-1 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline">
                                <option value=""> Kelas </option>
                                @foreach ($kelas as $s)
                                <option value="{{ $s->id }}">{{ $s->tingkat }}-{{ $s->jurusan }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-1 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <select wire:model='tahun' class="block w-full px-1 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline">
                                <option value=""> Tahun </option>
                                @foreach ($tahuns as $s)
                                <option value="{{ $s->tahun }}">{{ $s->tahun }} </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-1 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="relative flex flex-col w-1/2 mx-1 text-center">
                            @error('idsiswa')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <select wire:model='idsiswa' class="block w-full px-1 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline">
                                <option value=""> Siswa </option>
                                @foreach ($siswas as $s)
                                <option value="{{ $s->id }}">{{ $s->nama }} </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-1 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <input wire:model.defer='nis' type="text" id="weight-pounds" class="w-full px-1 py-2 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline" placeholder="NIS" aria-label="nis" readonly />
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="relative flex flex-col w-1/2 mx-1 text-center">
                            @error('idgunabayar')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                        <div class="relative flex flex-col w-1/2 mx-1 text-center">
                            @error('wajibbayar')
                            <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <select wire:model='idgunabayar' class="block w-full px-1 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline">
                                <option value=""> Guna Bayar </option>
                                @foreach ($gunabayars as $s)
                                <option value="{{ $s->id }}">{{ $s->gunabayar }} </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-1 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <input wire:model.defer='wajibbayar' type="number" id="weight-pounds" class="w-full px-1 py-2 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline" placeholder="Wajib Bayar" aria-label="wajibabayar"  />
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <input wire:model='jumlahbayar' type="number" id="weight-pounds" class="w-full px-1 py-2 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline" placeholder="Jumlah Bayar" aria-label="jumlahbayar" />
                        </div>
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                            <input wire:model.defer='jumlahbayarf' type="text" id="weight-pounds" class="w-full px-1 py-2 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline" placeholder="Jumlah Bayar" aria-label="jumlahbayar" readonly />
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center">
                            <button wire:click.prevent='kembali()' class="flex-shrink-0 px-2 py-1 text-sm text-teal-500 bg-gray-200 border-4 border-transparent rounded hover:bg-gray-300" type="button">
                                Kembali
                            </button>
                        </div>
                        <div class="relative flex flex-col w-1/2 mx-1 mb-2 text-center">
                            <button wire:click.prevent="store()" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700 focus:outline" type="button">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="relative flex flex-col w-full mx-1 text-xl">
                        <h1 class="text-black-500">Tagihan Siswa : {{ $namasiswa }}</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-sm text-gray-600 divide-y divide-gray-200">
                            <thead class=" table-info">
                                <th>Guna Bayar</th>
                                <th>Wajib Bayar</th>
                                <th>Jumlah Bayar</th>
                            </thead>
                            <tbody class="divide-y divide-gray-300 text-uppercase">
                                <tr class="{{ $tjuli }}">
                                    <td>
                                        Juli
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wjuli, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($juli, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tagustus }}">
                                    <td>
                                        agustus
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wagustus, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($agustus, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tseptember }}">
                                    <td>
                                        september
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wseptember, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($september, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $toktober }}">
                                    <td>
                                        oktober
                                    </td>
                                    <td>
                                        Rp. {{ number_format($woktober, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($oktober, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tnovember }}">
                                    <td>
                                        november
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wnovember, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($november, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tdesember }}">
                                    <td>
                                        desember
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wdesember, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($desember, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tjanuari }}">
                                    <td>
                                        januari
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wjanuari, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($januari, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tfebruari }}">
                                    <td>
                                        februari
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wfebruari, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($februari, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tmaret }}">
                                    <td>
                                        maret
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wmaret, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($maret, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tapril }}">
                                    <td>
                                        april
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wapril, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($april, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tmei }}">
                                    <td>
                                        mei
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wmei, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($mei, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tjuni }}">
                                    <td>
                                        juni
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wjuni, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($juni, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tuanggedung }}">
                                    <td>
                                        Uang Gedung
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wuanggedung, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($uanggedung, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $talatpraktek }}">
                                    <td>
                                        Alat Praktek
                                    </td>
                                    <td>
                                        Rp. {{ number_format($walatpraktek, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($alatpraktek, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                                <tr class="{{ $tseragam }}">
                                    <td>
                                        seragam
                                    </td>
                                    <td>
                                        Rp. {{ number_format($wseragam, 0, ".", ".") . ",-" }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($seragam, 0, ".", ".") . ",-" }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
