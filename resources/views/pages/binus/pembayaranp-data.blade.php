<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Pembayaran Panitia') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tata Usaha</a></div>
            <div class="breadcrumb-item"><a href="#">Data Pembayaran Panitia</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.tablepembayaranp name="pembayaran" :model="$pembayaran" />
    </div>
</x-app-layout>
