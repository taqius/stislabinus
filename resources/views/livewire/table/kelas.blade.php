<div>
    <x-data-table :data="$data" :model="$kelass">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tingkat')" role="button" href="#">
                    Tingkat
                    @include('components.sort-icon', ['field' => 'tingkat'])
                </a></th>
                <th><a wire:click.prevent="sortBy('jurusan')" role="button" href="#">
                    Jurusan
                    @include('components.sort-icon', ['field' => 'jurusan'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($kelass as $kelas)
                <tr x-data="window.__controller.dataTableController({{ $kelas->id }})">
                    <td>{{ $kelas->id }}</td>
                    <td>{{ $kelas->tingkat }}</td>
                    <td>{{ $kelas->jurusan }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" wire:click="edit({{ $kelas->id }})" class="mr-3"><i class="fas fa-edit"></i></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @if ($isOpen)
    @include('livewire.modal.modal-kelas')
    @endif  
</div>
