<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Tagihan Siswa') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Wali Kelas</a></div>
            <div class="breadcrumb-item"><a href="{{ route('cetakpdf') }}">Tagihan Siswa</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablecetakpdf name="cetakpdf" :model="$cetakpdf" />
    </div>
</x-app-layout>
