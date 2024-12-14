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
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Subcriber ID</th>
                                                    <th>License ID</th>
                                                    <th>Product Code</th>
                                                    <th>License Count</th>
                                                    <th>Subscription First Start Date</th>
                                                    <th>Command</th>
                                                    <th>Command Processing Date</th>
                                                    <th>Command Subscription Start Date</th>
                                                    <th>Command Subscription End Date</th>
                                                    <th>Command Trial Intervals Quantity</th>
                                                    <th>Command Chargeable Intervals Quantity</th>
                                                    <th>Subscription Trial Intervals Quantity</th>
                                                    <th>Subscription Chargeable Intervals Quantity</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($report_softcancel as $report)
                                                <tr>
                                                    <td>{{ $report->subscriber_id }}</td>
                                                    <td>{{ $report->license_id }}</td>
                                                    <td>{{ $report->product_code }}</td>
                                                    <td>{{ $report->license_count }}</td>
                                                    <td>{{ $report->subscription_first_start_date }}</td>
                                                    <td> {{ $report->command }}</td>
                                                    <td> {{ $report->command_processing_date }}</td>
                                                    <td> {{ $report->command_subscription_start_date }}</td>
                                                    <td> {{ $report->command_subscription_end_date_ }}</td>
                                                    <td> {{ $report->command_trial_intervals_quantity }}</td>
                                                    <td> {{ $report->command_chargeable_intervals_quantity }}</td>
                                                    <td> {{ $report->subcription_trial_intervals_quantity }}</td>
                                                    <td> {{ $report->subcription_chargeable_intervals_quantity }}
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
</div>


@push('js')
<script src="{{ asset('dist/') }}/assets/js/scripts/data-tables.js"></script>
@endpush