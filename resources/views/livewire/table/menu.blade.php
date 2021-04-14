<div>
    <x-data-table :data="$data" :model="$menus">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('section')" role="button" href="#">
                    Role
                    @include('components.sort-icon', ['field' => 'section'])
                </a></th>
                <th><a wire:click.prevent="sortBy('menu')" role="button" href="#">
                    Menu
                    @include('components.sort-icon', ['field' => 'menu'])
                </a></th>
                <th><a wire:click.prevent="sortBy('route')" role="button" href="#">
                    Route
                    @include('components.sort-icon', ['field' => 'route'])
                </a></th>
                <th><a wire:click.prevent="sortBy('icon')" role="button" href="#">
                    Icon
                    @include('components.sort-icon', ['field' => 'icon'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($menus as $menu)
                <tr x-data="window.__controller.dataTableController({{ $menu->id }})">
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->menu }}</td>
                    <td>{{ $menu->route }}</td>
                    <td>{{ $menu->icon }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" wire:click="edit({{ $menu->id }})" class="mr-3"><i class="fas fa-edit"></i></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="text-red-500 fa fa-16px fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @if ($isOpen)
    @include('livewire.modal.modal-menu')
    @endif  
</div>
