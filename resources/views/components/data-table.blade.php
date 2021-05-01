<div class="leading-normal tracking-wider text-gray-900 bg-gray-400">
    <div class="p-8 pt-4 mt-2 bg-white shadow-dark" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
        <div class="flex pb-4 -ml-3">
            <a wire:click="{{ $data->href->create_new }}" class="shadow-none -ml- btn btn-primary">
                <span class="fas fa-plus"></span> {{ $data->href->create_new_text }}
            </a>
            {{-- <a href="{{ $data->href->export }}" class="ml-2 shadow-none btn btn-success">
                <span class="fas fa-file-export"></span> {{ $data->href->export_text }}
            </a> --}}
        </div>

        <div class="mb-4 row">
            <div class="col form-inline">
                Per Page: &nbsp;
                <select wire:model="perPage" class="form-control shadow-dark">
                    <option>10</option>
                    <option>15</option>
                    <option>25</option>
                </select>
            </div>

            <div class="col">
                <input wire:model="search" class="shadow-dark form-control" type="text" placeholder="Pencarian...">
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

