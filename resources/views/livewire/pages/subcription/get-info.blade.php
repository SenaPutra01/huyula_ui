<div class="p-6">
    <h2 class="text-lg font-medium text-gray-800">
        {{ __('Detail Subscriber') }}
    </h2>

    <div class="grid grid-row-3 grid-flow-col gap-2">
        <div class="mt-6">
            <x-text-input label="MSISDN" :disabled="true" type="text" value="{{ $msisdn }}" />
            <x-text-input id="form.status" label="Status" :disabled="true" type="text" value="{{ $status }}" />
            <x-text-input id="form.starttime" label="Start Time" :disabled="true" type="text"
                value="{{ $startTime }}" />
            <x-text-input id="form.endtime" label="End Time" :disabled="true" type="text" value="{{ $endTime }}" />
            <x-text-input id="form.productid" label="Product ID" :disabled="true" type="text"
                value="{{ $productId }}" />
            <x-text-input id="form.shorten" label="Shorten" :disabled="true" type="text" value="{{ $shorten }}" />
        </div>
    </div>
</div>