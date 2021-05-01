<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pengeluaran') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tata Usaha</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pengeluaran') }}">Data Pengeluaran</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablepengeluaran name="pengeluaran" :model="$pengeluaran" />
    </div>
</x-app-layout>
