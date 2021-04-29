<div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>  
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            {{-- End Of Show Modal --}}
            {{-- Your Form Should Inside Down Here --}}
                {{-- Start Of Display Form --}}
                <div class="max-w-md p-4 mx-auto my-10 bg-white rounded-md shadow-sm">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Buat Siswa</h1>
                        <p class="text-gray-400 dark:text-gray-400">Buat Data Siswa</p>
                    </div>
                    <div class="m-7">
                        <form class="w-full max-w-sm">
                            @error('nis')
                                <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                                <input type="hidden" wire:model='idsiswa' id="idsiswa">
                                <input wire:model.defer='nis' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="NIS" aria-label="nis">
                            </div>
                            @error('nama')
                                <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                                <input wire:model.defer='nama' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="Nama" aria-label="nama">
                            </div>
                            @error('idkelas')
                                    <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <div class="relative flex items-center py-2 mb-2 border-b border-teal-500">
                                <select wire:model.defer='idkelas' class="block w-full px-2 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline-none">
                                    <option value=""> Pilih Kelas </option>
                                    @foreach ($kelas as $s)
                                    <option value="{{ $s->id }}">{{ $s->tingkat }}-{{ $s->jurusan }} </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('tahun')
                                <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                                <input type="hidden" wire:model='idsiswa' id="idsiswa">
                                <input wire:model.defer='tahun' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="2xxx / 2xxx" aria-label="tahun">
                            </div>
                            @error('ortu')
                                <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                                <input wire:model.defer='ortu' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="ortu" aria-label="ortu">
                            </div>
                            @error('ket')
                                    <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <div class="relative flex items-center py-2 mb-2 border-b border-teal-500">
                                <select wire:model.defer='ket' class="block w-full px-2 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline-none">
                                    <option value=""> Keterangan </option>
                                    @foreach ($keter as $k)
                                    <option value="{{ $k->ket }}">{{ $k->ket }} </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="my-4">
                                <button wire:click.prevent="store()" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700" type="button">
                                    {{ $simpan }}
                                </button>
                                <button wire:click.prevent='hideModal()' class="flex-shrink-0 px-2 py-1 text-sm text-teal-500 bg-gray-200 border-4 border-transparent rounded hover:bg-gray-300" type="button">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- End Of Display Form --}}
            {{-- Your Form Should Inside Up Here --}}
        </div>
    </div>
</div>
