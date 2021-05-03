<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Keuangan Panitia') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Panitia</a></div>
            <div class="breadcrumb-item"><a href="{{ route('keuanganp') }}">Data Keuangan Panitia</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablekeuanganp2 name="keuanganp2" :model="$keuanganp2" />
    </div>
</x-app-layout>
