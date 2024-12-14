@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/pages/data-tables.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/custom/custom.css">
@endpush
<div class="row">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <!-- Page Length Options -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="export right mt-3 px-5 pb-3">
                                    {{-- <x-button href="{{ route('export.excel') }}">Excel</x-button>
                                    <x-button href="{{ route('export.pdf') }}">PDF</x-button>
                                    <x-button href="{{ route('export.csv') }}">CSV</x-button> --}}
                                    {{-- <a href="" class="btn btn-success">Generate Subcription</a> --}}
                                    <x-button-default href="#">Generate Subscription</x-button-default>
                                    {{-- <a href="" class="btn btn-success">PDF</a>
                                    <a href="" class="btn btn-success">CSV</a> --}}
                                </div>
                                <div class="card-content mt-3">
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="subscriber-table" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>Info</th>
                                                        <th>Subcriber ID</th>
                                                        <th>Product Code</th>
                                                        <th>License Count</th>
                                                        <th>MSISDN</th>
                                                        <th>Start date</th>
                                                        <th>End date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach($subscribers as $subscriber)
                                                    <tr>
                                                        <td><a href="" class="btn btn-success">PDF</a>
                                                        </td>
                                                        <td>{{ $subscriber->subscriberid }}</td>
                                                        <td>{{ $subscriber->productcode }}</td>
                                                        <td>{{ $subscriber->licensecount }}</td>
                                                        <td>{{ $subscriber->msisdn }}</td>
                                                        <td>{{
                                                            \Carbon\Carbon::parse($subscriber->starttime)->format('Y-m-d
                                                            H:i') }}</td>
                                                        <td>{{
                                                            \Carbon\Carbon::parse($subscriber->starttime)->format('Y-m-d
                                                            H:i') }}</td>

                                                    </tr>
                                                    @endforeach --}}
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Info</th>
                                                        <th>Subcriber ID</th>
                                                        <th>Product Code</th>
                                                        <th>License Count</th>
                                                        <th>MSISDN</th>
                                                        <th>Start date</th>
                                                        <th>End date</th>
                                                    </tr>
                                                </tfoot>
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
        <x-modal name="getInfo" :show="$errors->isNotEmpty()" focusable>
            <livewire:pages.subcription.get-info />
        </x-modal>
    </div>

    @push('js')
    <script>
        $(document).ready(function() {
        $('#subscriber-table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: '{{ route('subscription-data') }}',
                dataSrc: 'data'
            },
            columns: [
                { data: 'subscriberid' },
                { data: 'productcode' },
                { data: 'licensecount' },
                { data: 'msisdn' },
                { data: 'starttime',
                    render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm');
                    }
                },
                { data: 'endtime',
                    render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm');
                    }
                },
                { data: '',
                    render: function (data, type, row) {
                                // return `
                                // <div class="d-flex gap-2">
                                    
                                //     <button type="submit" class="btn btn-block red accent-4 waves-effect waves-light"
                                //         wire:click="getInfo('${row.msisdn}', '${row.productcode}')" x-on:click.prevent="$dispatch('open-modal', 'getInfo') 
                                //         wire:loading.attr="disabled">Export
                                //     Excel
                                //     <span wire:loading>
                                //         {{ __(' Processing...') }}
                                //     </span></button>
                                // </div>
                                // `;
                                return `
                                <div class="d-flex gap-2">
                                    
                                    <a x-on:click.prevent="$dispatch('open-modal', 'getInfo')">
                                        <i class="material-icons text-center px-5" style="display: inline; margin: auto;">visibility</i>    
                                    </a>
                                </div>
                                `;
                        },
                },
            ],
            paging: true,
            lengthMenu: [10, 25, 50],
            responsive: true,
            scrollX: true
        });
    });
    </script>
    <script src="{{ asset('dist/') }}/assets/js/scripts/data-tables.js"></script>
    @endpush