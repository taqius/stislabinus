<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data User Role') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="">Admin</a></div>
            <div class="breadcrumb-item"><a href="{{ route('role') }}">Data Role</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablerole name="role" :model="$role" />
    </div>
</x-app-layout>
