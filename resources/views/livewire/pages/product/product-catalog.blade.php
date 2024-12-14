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
                                {{-- <a class="btn  red accent-4 add">New Product</a> --}}
                                <x-danger-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Add
                                    Product') }}</x-danger-button>
                                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'soft-cancel')">
                                    {{ __('Bulk
                                    Soft Cancel') }}</x-danger-button>
                                <x-danger-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'activate-bulk')">{{
                                    __('Bulk
                                    Activate') }}</x-danger-button>
                            </div>
                            <div class="card-content mt-3">
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Product ID</th>
                                                    <th>License Count</th>
                                                    <th>Client</th>
                                                    <th>Product Code</th>
                                                    <th>Days</th>
                                                    <th>Wording</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $product->productid }}</td>
                                                    <td>{{ $product->licensecount }}</td>
                                                    <td>{{ $product->client }}</td>
                                                    <td>{{ $product->productcode }}</td>
                                                    <td>{{ $product->days }}</td>
                                                    <td> {{ $product->wording }}</td>
                                                    <td>
                                                        {{-- <x-button-default>
                                                            <i class="material-icons">delete</i>
                                                        </x-button-default> --}}
                                                        <a href="">
                                                            <i class="material-icons">delete</i>
                                                        </a>
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
    <x-modal name="activate-bulk" :show="$errors->isNotEmpty()" focusable>
        <livewire:pages.reporting.bulk-activate />
    </x-modal>
    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <livewire:pages.product.create-product />
    </x-modal>
    <x-modal name="soft-cancel" :show="$errors->isNotEmpty()" focusable>
        <livewire:pages.reporting.soft-delete />
    </x-modal>


</div>

@push('js')
<script src="{{ asset('dist/') }}/assets/js/scripts/data-tables.js"></script>
@endpush