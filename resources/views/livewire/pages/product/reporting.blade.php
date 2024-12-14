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
                                {{-- <x-button-default event="openModal">Add Product</x-button-default> --}}
                                {{-- <button wire:click="$dispatch('openModal', { component: 'modal-component' })">Edit
                                    User</button> --}}
                                <x-button-default wire:click="$dispatch('openModal', { component: 'modal-component' })"
                                    class="mb-4">
                                    Export Report
                                </x-button-default>

                            </div>

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
                                                @foreach($reporting as $report)
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
                                                    {{-- <td>
                                                        <x-button-default>
                                                            <i class="material-icons">delete</i>
                                                        </x-button-default>
                                                    </td> --}}
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