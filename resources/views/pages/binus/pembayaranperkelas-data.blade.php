<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pembayaran Non-SPP Per Kelas') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Panitia</a></div>
            <div class="breadcrumb-item"><a href="{{ route('keuanganp') }}">Data Pembayaran Non-SPP Per Kelas</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablepembayaranperkelas name="pembayaranperkelas" :model="$pembayaranperkelas" />
    </div>
</x-app-layout>
