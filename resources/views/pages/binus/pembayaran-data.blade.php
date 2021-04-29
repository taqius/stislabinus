<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pembayaran SPP') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tata Usaha</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pembayaran') }}">Data Pembayaran SPP</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablepembayaran name="pembayaran" :model="$pembayaran" />
    </div>
</x-app-layout>
