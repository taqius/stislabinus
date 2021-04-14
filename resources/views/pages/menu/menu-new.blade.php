<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Menu Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('menu') }}">Data Menu</a></div>
            <div class="breadcrumb-item"><a href="{{ route('menu.new') }}">Buat Menu Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create.createmenu action="createmenu" />
    </div>
</x-app-layout>
