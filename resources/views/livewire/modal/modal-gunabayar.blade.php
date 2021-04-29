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
                        <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Buat Guna Bayar</h1>
                        <p class="text-gray-400 dark:text-gray-400">Silahkan buat Guna Bayar</p>
                    </div>
                    <div class="m-7">
                        <form class="w-full max-w-sm">
                            @error('role_id')
                                    <h1 class="text-red-500">{{ $message }}</h1>
                            @enderror
                            <div class="relative flex items-center py-2 mb-2 border-b border-teal-500">
                                <input type="hidden" wire:model='idgunabayar' id="idgunabayar">
                                <input wire:model.defer='gunabayar' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="Guna Bayar" aria-label="gunabayar">
                                @error('gunabayar')
                                    <h1 class="text-red-500">{{ $message }}</h1>
                                @enderror
                            </div>
                            <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                                <input wire:model.defer='wajibbayar' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="number" placeholder="Wajib Bayar" aria-label="wajibbayar">
                                @error('wajibbayar')
                                    <h1 class="text-red-500">{{ $message }}</h1>
                                @enderror
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
