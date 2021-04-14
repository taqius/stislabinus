<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Menu') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Admin</a></div>
            <div class="breadcrumb-item"><a href="{{ route('menu') }}">Data menu</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablemenu name="menu" :model="$menu" />
    </div>
</x-app-layout>
