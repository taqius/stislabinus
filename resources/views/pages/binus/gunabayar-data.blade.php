<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Guna Bayar') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tata Usaha</a></div>
            <div class="breadcrumb-item"><a href="{{ route('gunabayar') }}">Data Guna Bayar</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablegunabayar name="gunabayar" :model="$gunabayar" />
    </div>
</x-app-layout>
