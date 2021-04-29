<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Siswa') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tata Usaha</a></div>
            <div class="breadcrumb-item"><a href="{{ route('siswa') }}">Data Siswa</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablesiswa name="siswa" :model="$siswa" />
    </div>
</x-app-layout>
