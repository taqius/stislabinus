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
            <div class="max-w-lg p-2 mx-1 my-3 bg-white rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Input Pengeluaran</h1>
                </div>
                <div class="m-5">
                    <form class="w-full max-w-lg">
                        <div class="flex items-center justify-between mb-2">
                            <div class="relative flex flex-col w-1/2 mx-1 text-left">
                                <label>Tanggal Simpan</label>
                                @error('tanggalsimpan')
                                <h1 class="text-red-500">{{ $message }}</h1>
                                @enderror
                            </div>
                            <div class="relative flex flex-col w-1/2 mx-1 text-left">
                                <label>Tanggal Nota</label>
                                @error('tanggalnota')
                                <h1 class="text-red-500">{{ $message }}</h1>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                                <input wire:model='idpengeluaran' type="hidden" id="idpengeluaran" class="w-full px-1 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline"/>
                                <input wire:model.defer='tanggalsimpan' type="date" id="tanggalsimpan" class="w-full px-1 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline"/>
                            </div>
                            <div class="flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                                <input wire:model.defer='tanggalnota' type="date" id="tanggalnota" class="w-full px-1 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline"/>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="relative flex flex-col w-1/2 mx-1 text-center">
                                @error('keterangan')
                                <h1 class="text-red-500">{{ $message }}</h1>
                                @enderror
                            </div>
                            <div class="relative flex flex-col w-1/2 mx-1 text-center">
                                @error('jumlahbayar')
                                    <h1 class="text-red-500">{{ $message }}</h1>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                                <input wire:model.defer='keterangan' type="text" id="weight-pounds" class="w-full px-1 py-2 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline" placeholder="Keterangan" aria-label="Keterangan" />
                            </div>
                            <div class="flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                                <input wire:model.debounce.200ms='jumlahbayar' type="number" id="weight-pounds" class="w-full px-1 py-2 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline" placeholder="Jumlah Bayar" aria-label="Jumlah Bayar" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex flex-col w-1/2 mx-1 mb-2 text-center">
                                
                            </div>
                            <div class="flex flex-col w-1/2 mx-1 mb-2 text-center border-b border-teal-500">
                                <input wire:model.defer='jumlahbayarf' type="text" id="weight-pounds" class="w-full px-1 py-2 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline" value="{{ $jumlahbayarf }}" readonly />
                            </div>
                        </div>
                        <div class="my-4">
                            <button wire:click.prevent="store()" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700 focus:outline" type="button">
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