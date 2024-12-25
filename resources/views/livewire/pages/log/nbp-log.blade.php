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
                                            <table id="nbp-log-table" class="display nowrap" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">MSISDN</th>
                                                        <th scope="col">Date Created</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Request</th>
                                                        <th scope="col">Response</th>
                                                        <th scope="col">TRX ID</th>
                                                        <th scope="col">Transaction ID</th>
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
            $('#nbp-log-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('log.nbp-data') }}',
                    dataSrc: 'data',
                },
                columns: [
                    { data: 'msisdn' },
                    { data: 'created_at', 
                        render: function(data, type, row) {
                            return moment(data).format('YYYY-MM-DD HH:mm');
                        }
                    },
                    { data: 'status' },
                    { data: 'req' },
                    { data: 'resp' },
                    { data: 'transaction_id' },
                    { data: 'trx_id' },
                ],
                paging: true,
                lengthMenu: [10, 25, 50],
                searching: true,
                scrollY: 400,
                scrollX: true,
                columnDefs: [
                    {
                        targets: [3, 4],
                        render: function(data, type, row) {
                            return '<div style="max-width: 500px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' + data + '</div>';
                        }
                    }
                ]
            });
        });
    </script>
    @endpush