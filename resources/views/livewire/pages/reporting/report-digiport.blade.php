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
                                    <div class="col s12">
                                        <table id="report-digiport-table" class="display">
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
    $(document).ready(function() {
            $('#report-digiport-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('reporting.digiport-data') }}',
                    dataSrc: 'data'
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
                paging: true,
                lengthMenu: [10, 25, 50],
                responsive: true,
                scrollX: true
            });
        });
</script>
<script src="{{ asset('dist/') }}/assets/js/scripts/data-tables.js"></script>
@endpush