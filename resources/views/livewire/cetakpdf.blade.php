<div class="card card-body shadow-dark">
    <div class="w-full py-2 mx-auto mb-2 md:flex max-w-7xl sm:px-6 lg:px-8">
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
                <select wire:model='idkelas' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value=""> Kelas </option>
                    @foreach ($kelass as $g)
                        <option value="{{ $g->id }}"> {{  $g->tingkat }}-{{ $g->jurusan }}</option>
                    @endforeach
                </select>
        </div>
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
                <select wire:model='tahun' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value="">Tahun Ajaran</option>
                    @foreach ($tahuns as $t)
                    <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                    @endforeach
                </select>
        </div>
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
                <select wire:model='idsiswa' class="w-full px-2 py-2 border rounded shadow appearance-non">
                    <option value="">Siswa</option>
                    @foreach ($siswas as $t)
                    <option value="{{ $t->id }}">{{ $t->nama }}</option>
                    @endforeach
                </select>
        </div>
        <div class="px-1 mb-6 md:w-1/4 md:mb-0">
            <button wire:click="cetak()" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Download</button>
        </div>
    </div>
    <div class="w-full py-2 mx-auto mb-2 md:flex max-w-7xl sm:px-6 lg:px-8">
    </div>
</div>
