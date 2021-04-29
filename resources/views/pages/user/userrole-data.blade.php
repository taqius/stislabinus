<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data User Role') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="">User Role</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.role') }}">Data User Role</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tableuserrole name="user" :model="$user" />
    </div>
</x-app-layout>
