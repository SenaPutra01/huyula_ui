<div class="p-6">
    <h2 class="text-lg font-medium text-gray-800">
        {{ __('Detail Subscriber') }}
    </h2>

    <div class="grid grid-row-3 grid-flow-col gap-2">
        <div class="mt-6">
            <x-text-input id="form.productid" wire:model="form.productid" label="Product ID" :disabled="false"
                type="text" />
            <x-text-input id="form.client" wire:model="form.client" label="Client" :disabled="false" type="text" />

            <x-text-input id="form.days" wire:model="form.days" label="Days" :disabled="false" type="number" />
        </div>
        <div class="mt-6">
            <x-text-input id="form.productid" wire:model="form.productid" label="Product ID" :disabled="false"
                type="text" />
            <x-text-input id="form.client" wire:model="form.client" label="Client" :disabled="false" type="text" />

            <x-text-input id="form.days" wire:model="form.days" label="Days" :disabled="false" type="number" />
        </div>
    </div>
</div>