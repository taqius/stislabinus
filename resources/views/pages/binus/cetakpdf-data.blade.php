<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Laporan Tagihan Siswa') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tata Usaha</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pembayaran.new') }}">Laporan Tagihan Siswa</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:cetakpdf />
    </div>
</x-app-layout>
