<div class="leading-normal tracking-wider text-gray-900 bg-gray-400">
    <div class="p-8 pt-4 mt-2 bg-white shadow-dark" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
        <div class="mb-4 row">
            <div class="col form-inline">
                Qty: &nbsp;
                <select wire:model="perPage" class="form-control">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
                </select>
                &nbsp; &nbsp;
                <select wire:model="sortKelas" class="form-control">
                    <option value=""> Kelas </option>
                    @foreach ($data->href->kelase as $k)
                    <option value="{{ $k->id }}"> {{ $k->tingkat}}-{{ $k->jurusan }}</option>
                    @endforeach
                </select>
                &nbsp; &nbsp;
                <select wire:model="sortGunabayar" class="form-control">
                    <option value=""> Guna Bayar</option>
                    @foreach ($data->href->gunabayare as $k)
                    <option value="{{ $k->id }}"> {{ $k->gunabayar }}</option>
                    @endforeach
                </select>
                &nbsp; &nbsp;
                <select wire:model="sortTahun" class="form-control">
                    <option value=""> Tahun </option>
                    @foreach ($data->href->tahune as $t)
                        <option value="{{ $t->tahun }}"> {{ $t->tahun }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <input wire:model="search" class="form-control shadow-dark" type="text" placeholder="Pencarian...">
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table text-sm text-gray-600 divide-y divide-gray-200 table-striped">
                    <thead>
                        {{ $head }}
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        {{ $body }}
                    </tbody>
                </table>
            </div>
        </div>

        <div id="table_pagination" class="py-3">
            {{ $model->onEachSide(1)->links() }}
        </div>
    </div>
</div>

