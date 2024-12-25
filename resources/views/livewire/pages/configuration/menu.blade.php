@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/pages/data-tables.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/custom/custom.css">
@endpush

<div class="row">
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">
                <!-- Page Length Options -->
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="export right mt-3 px-5 pb-3">
                                {{-- @can('create konfigurasi/menu')
                                <x-button-default wire:click="$dispatch('openModal', { component: 'modal-component' })"
                                    class="mb-4">
                                    New
                                </x-button-default>
                                @endcan --}}
                                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-menu')">
                                    {{
                                    __('Add Menu') }}</x-danger-button>

                            </div>
                            <div class="card-content mt-3">
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Orders</th>
                                                    <th>Url</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($menus as $menu)
                                                <tr>
                                                    <td>{{ $menu->name }}</td>
                                                    <td>{{ $menu->orders }}</td>
                                                    <td>{{ $menu->url }}</td>
                                                    <td>{{ $menu->category }}</td>
                                                    <td>
                                                        {{-- <x-button-default> --}}
                                                            <a href="">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                            {{--
                                                        </x-button-default> --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
    <x-modal name="create-menu" :show="$errors->isNotEmpty()" focusable>
        <livewire:pages.configuration.create-menu />
    </x-modal>
    {{-- <x-modal name="create-menu" :show="$errors->isNotEmpty()" focusable>
        <livewire:pages.reporting.bulk-activate />
    </x-modal> --}}
</div>

@push('js')
<script src="{{ asset('dist/') }}/assets/js/scripts/data-tables.js"></script>
@endpush