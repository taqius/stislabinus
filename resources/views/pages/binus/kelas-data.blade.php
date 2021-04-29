<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Kelas') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tata Usaha</a></div>
            <div class="breadcrumb-item"><a href="{{ route('kelas') }}">Data Kelas</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablekelas name="kelas" :model="$kelas" />
    </div>
</x-app-layout>
