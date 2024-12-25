@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/pages/data-tables.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/custom/custom.css">
@endpush

<div class="container">
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content mt-3">
                        <div class="row">
                            <div class="col s12">
                                <div class="mb-3 flex justify-end space-x-3">
                                    <div class="flex-1 max-w-xs">
                                        <x-floating-input :type="'text'" :label="'Search MSISDN'" :id="'search_msisdn'"
                                            oninput="triggerSearch('msisdn')" />
                                    </div>
                                    <div class="flex-1 max-w-xs">
                                        <x-floating-input :type="'text'" :label="'Search Subcriber ID'"
                                            :id="'search_subscriberid'" oninput="triggerSearch('subcriberid')" />
                                    </div>
                                    <div class="flex-1 max-w-xs">
                                        <x-floating-input :type="'text'" :label="'Search Status'" :id="'search_status'"
                                            oninput="triggerSearch('satatus')" />
                                    </div>
                                </div>


                                <div class="form-row mb-3">
                                    <table id="log-activity-table" class="display nowrap" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">MSISDN</th>
                                                <th scope="col">Subscriber ID</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Activation Code</th>
                                                <th scope="col">Request</th>
                                                <th scope="col">Response</th>
                                                <th scope="col">Change Date</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">End Date</th>
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

@push('js')

<script>
    let search_msisdn = '';
    let search_subscriberid = '';
    let search_status = '';

    $(document).ready(function() {
        var table = $('#log-activity-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: function(data, callback, settings) {
                const searchValue = {
                    msisdn: search_msisdn,
                    subscriberid: search_subscriberid,
                    status: search_status
                };

                $.ajax({
                    url: '{{ route('log-data') }}',
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
                { data: 'msisdn' },
                { data: 'subscriberid' },
                { data: 'status' },
                { data: 'activationcode' },
                { data: 'req_text' },
                { data: 'resp_text' },
                {
                        data: 'statuschangetime',
                        render: function(data, type, row) {
                            return moment(data).format('YYYY-MM-DD HH:mm');
                        }
                    },
                    {
                        data: 'starttime',
                        render: function(data, type, row) {
                            return moment(data).format('YYYY-MM-DD HH:mm');
                        }
                    },
                    {
                        data: 'endtime',
                        render: function(data, type, row) {
                            return moment(data).format('YYYY-MM-DD HH:mm');
                        }
                    }
            ],
            columnDefs: [
                {
                    "targets": [4, 5],
                    "createdCell": function(td, cellData, rowData, row, col) {
                        $(td).html('<pre style="white-space: pre-wrap; word-wrap: break-word;">' + $('<div>').text(cellData).html() + '</pre>');
                    }
                }
            ],
            scrollY: 450,
            scrollX: true,
            pageLength: 10,
            deferRender: true,
            stateSave: true
        });

        function handleSearchInput(event, filterType) {
            if (event.key === 'Enter') {
                if (filterType === 'msisdn') {
                    search_msisdn = $('#search_msisdn').val();
                } else if (filterType === 'subscriberid') {
                    search_subscriberid = $('#search_subscriberid').val();
                } else if (filterType === 'status') {
                    search_status = $('#search_status').val();
                }

                table.ajax.reload();
            }
        }

        $('#search_msisdn').on('keydown', function(event) {
            handleSearchInput(event, 'msisdn');
        });
        $('#search_subscriberid').on('keydown', function(event) {
            handleSearchInput(event, 'subscriberid');
        });
        $('#search_status').on('keydown', function(event) {
            handleSearchInput(event, 'status');
        });
    });
</script>
@endpush