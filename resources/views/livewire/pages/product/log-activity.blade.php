@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/pages/data-tables.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/custom/custom.css">
@endpush
<div class="row">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content mt-3">
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="log-activity-table" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>Date Created</th>
                                                        <th>Status</th>
                                                        <th>Request</th>
                                                        <th>Response</th>
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
        $(document).ready(function() {
            $('#log-activity-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('log-data') }}',
                    dataSrc: 'data',
                },
                columns: [
                    { data: 'created_at', render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm');
                    }},
                    { data: 'status' },
                    { data: 'req' },
                    { data: 'resp' },
                ],
                paging: true,
                lengthMenu: [10, 25, 50],
                responsive: true,
                scrollX: true,
                columnDefs: [
                    {
                        targets: [2, 3],
                        render: function(data, type, row) {
                            return '<div style="max-width: 500px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' + data + '</div>';
                        }
                    }
                ]
            });
        });
    </script>


    <script src="{{ asset('dist/') }}/assets/js/scripts/data-tables.js"></script>
    @endpush