<div>
    <h2 class="mt-5">Data Laporan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subscriber ID</th>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($report_portal as $item)
            <tr>
                <td>{{ $item->subscriber_id }}</td>
                <td>{{ $item->license_id }}</td>
                <td>{{ $item->product_code }}</td>
                <td>{{ $item->license_count }}</td>
                <td>{{ $item->subscription_first_start_date }}</td>
                <td>{{ $item->command }}</td>
                <td>{{ $item->command_processing_date }}</td>
                <td>{{ $item->command_subscription_start_date }}</td>
                <td>{{ $item->command_subscription_end_date_ }}</td>
                <td>{{ $item->command_trial_intervals_quantity }}</td>
                <td>{{ $item->command_chargeable_intervals_quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>