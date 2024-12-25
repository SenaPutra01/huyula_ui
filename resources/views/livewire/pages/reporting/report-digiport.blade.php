@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/pages/data-tables.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/custom/custom.css">
@endpush

<div class="row">
    <div class="col s12">
        <div class="container">
            <div class="users-list-filter mt-3">
                <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m6 l4">
                            <div class="input-field">
                                <input type="date" wire:model="from_date">
                                <label for="from_date">Dari Tanggal:</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="input-field">
                                <input type="date" wire:model="to_date">
                                <label for="to_date">Sampai Tanggal:</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 display-flex align-items-center show-btn mt-2">
                            <button type="submit" class="btn btn-block red accent-4 waves-effect waves-light"
                                wire:click="export('xlsx')" wire:loading.attr="disabled">Export
                                Excel
                                <span wire:loading>
                                    {{ __(' Processing...') }}
                                </span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-data-tables">
                <!-- Page Length Options -->
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content mt-3">
                                <div class="row">
                                    <div class="mb-3 flex justify-end space-x-3">
                                        <div class="flex-1 max-w-xs">
                                            <x-floating-input :type="'text'" :label="'Search Subcriber ID'"
                                                :id="'search_subscriberid'" />
                                        </div>
                                        <div class="flex-1 max-w-xs">
                                            <x-floating-input :type="'date'" :label="'Start Date'"
                                                :id="'search_startDate'" />
                                        </div>
                                        <span class="mx-4 text-gray-500">to</span>
                                        <div class="flex-1 max-w-xs">
                                            <x-floating-input :type="'date'" :label="'End Date'"
                                                :id="'search_endDate'" />
                                        </div>
                                    </div>

                                    <div class="col s12">
                                        <table id="report-digiport-table" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product ID</th>
                                                    <th>License Count</th>
                                                    <th>Subscriber ID</th>
                                                    <th>License Count</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>grl</th>
                                                    <th>Activate Code</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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
</div>


@push('js')
<script>
    let search_msisdn = '';
    let search_subscriberid = '';
    let search_startDate = '';
    let search_endDate = '';

    $(document).ready(function() {
        var table = $('#report-digiport-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: function(data, callback, settings) {
                const searchValue = {
                    msisdn: search_msisdn,
                    subscriberid: search_subscriberid,
                    startDate: search_startDate,
                    endDate: search_endDate
                };

                $.ajax({
                    url:  '{{ route('reporting.digiport-data') }}',
                    method: 'GET',
                    data: {
                        start: settings.start,
                        length: settings.length,
                        search: searchValue,
                        draw: settings.draw
                    },
                    success: function(response) {
                        if (response && response.data) {
                            callback({
                                draw: settings.draw,
                                recordsTotal: response.recordsTotal,
                                recordsFiltered: response.recordsFiltered,
                                data: response.data
                            });
                        } else {
                            console.error('Invalid JSON response');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data: ' + error);
                    }
                });
            },
            columns: [
                { data: 'productid' },
                { data: 'licensecount' },
                { data: 'subscriberid' },
                { data: 'license_count' },
                { data: 'grl' },
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
                { data: 'created_at',
                    render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm');
                    }
                }
            ],
            // scrollY: 450,
            // scrollX: true,
            pageLength: 10,
            deferRender: true,
            stateSave: true,
            
        });

        // Function to handle search input and trigger filter reload
        function handleSearchInput(event, filterType) {
            if (filterType === 'subscriberid') {
                search_subscriberid = $('#search_subscriberid').val();
            } else if (filterType === 'startDate') {
                search_startDate = $('#search_startDate').val();
            } else if (filterType === 'endDate') {
                search_endDate = $('#search_endDate').val();
            }

            // Reload the DataTable with updated filters
            table.ajax.reload();
        }

        $('#search_subscriberid').on('input', function() {
            handleSearchInput(event, 'subscriberid');
        });
        $('#search_startDate').on('input', function() {
            handleSearchInput(event, 'startDate');
        });
        $('#search_endDate').on('input', function() {
            handleSearchInput(event, 'endDate');
        });
    });
</script>

@endpush