div<div class="fixed inset-0 z-10 overflow-y-auto">
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
                        <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Set User Role</h1>
                        <p class="text-gray-400 dark:text-gray-400">Silahkan Set User Role</p>
                    </div>
                    <div class="m-7">
                        <form class="w-full max-w-sm">
                            <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                                <input type="hidden" wire:model='user_id' id="user_id">
                                <input wire:model='user' class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" value="{{ $user }}" readonly>
                            </div>
                            <div class="block mt-3">
                                <span class="text-gray-700">Roles</span>
                                <div class="mt-2">
                                    @foreach ($rolenya as $r)
                                    <div class="flex items-center py-2 mb-2 border-b border-teal-500">
                                        <input class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none" type="text" value="{{ $r->name }}" readonly>
                                        <button wire:click.prevent="delete_t({{ $r->id }})" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-red-500 border-4 border-red-500 rounded hover:bg-red-700 hover:border-red-700" type="button">
                                            Del
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="relative flex items-center py-2 mb-2 border-b border-teal-500">
                                <input type="hidden" wire:model.defer='idmenu' id="idmenu">
                                <select wire:model.defer='role_id' class="block w-full px-2 py-2 pr-8 leading-tight bg-white border-none appearance-none focus:outline-none">
                                    <option value=""> Pilih Role </option>
                                    @foreach ($roless as $s)
                                    <option value="{{ $s->name }}">{{ $s->name }} </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="my-4">
                                <button wire:click.prevent="add()" class="flex-shrink-0 px-2 py-1 text-sm text-white bg-teal-500 border-4 border-teal-500 rounded hover:bg-teal-700 hover:border-teal-700" type="button">
                                    Add
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
