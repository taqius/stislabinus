<div>
    <x-data-table :data="$data" :model="$gunabayars">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('gunabayar')" role="button" href="#">
                    Gunabayar
                    @include('components.sort-icon', ['field' => 'gunabayar'])
                </a></th>
                <th><a wire:click.prevent="sortBy('wajibbayar')" role="button" href="#">
                    Wajib Bayar
                    @include('components.sort-icon', ['field' => 'wajibbayar'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($gunabayars as $gunabayar)
                <tr x-data="window.__controller.dataTableController({{ $gunabayar->id }})">
                    <td>{{ $gunabayar->id }}</td>
                    <td>{{ $gunabayar->gunabayar }}</td>
                    <td>{{ $gunabayar->wajibbayar }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" wire:click="edit({{ $gunabayar->id }})" class="mr-3"><i class="fas fa-edit"></i></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @if ($isOpen)
    @include('livewire.modal.modal-gunabayar')
    @endif  
</div>
