<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Keuangan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Panitia</a></div>
            <div class="breadcrumb-item"><a href="{{ route('keuanganp') }}">Data Keuangan Panitia</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:keuanganp />
    </div>
</x-app-layout>
