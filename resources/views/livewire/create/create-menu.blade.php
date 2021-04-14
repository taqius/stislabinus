<div class="flex items-center bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md p-4 mx-auto my-10 bg-white rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Buat Menu</h1>
                <p class="text-gray-400 dark:text-gray-400">Silahkan buat menu sesuai selera</p>
            </div>
            <div class="m-7">
                <form class="w-full max-w-sm">
                    @error('section_id')
                            <h1 class="text-red-500">{{ $message }}</h1>
                    @enderror
                    <div class="relative flex items-center py-2 mb-2 border-b border-teal-500">
                        <input type="hidden" wire:model.defer='idsection' id="idsection">
                        <select wire:model.defer='section_id' class="block w-full px-2 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline-none">
                            <option value=""> Pilih Section </option>
                            @foreach ($section as $s)
                            <option value="{{ $s->id }}">{{ $s->section }} </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                        <input wire:model.defer='menu' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="Menu" aria-label="Menu">
                        @error('menu')
                            <h1 class="text-red-500">{{ $message }}</h1>
                        @enderror
                    </div>
                    <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                        <input wire:model.defer='route' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="Route" aria-label="Route">
                        @error('route')
                            <h1 class="text-red-500">{{ $message }}</h1>
                        @enderror
                    </div>
                    <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                        <input wire:model.defer='icon' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" placeholder="Icon" aria-label="Icon">
                        @error('icon')
                            <h1 class="text-red-500">{{ $message }}</h1>
                        @enderror
                    </div>
                    <div class="my-4">
                        <button wire:click.prevent="store()" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700" type="button">
                            Simpan
                        </button>
                        <button wire:click.prevent='cancel()' class="flex-shrink-0 px-2 py-1 text-sm text-teal-500 bg-gray-200 border-4 border-transparent rounded hover:bg-gray-300" type="button">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" /> 
