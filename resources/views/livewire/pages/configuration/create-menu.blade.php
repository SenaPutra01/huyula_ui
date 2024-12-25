<form wire:submit="" class="p-6">
    <h2 class="text-lg font-medium text-gray-800">
        {{ __('Create Menu') }}
    </h2>

    <div class="grid grid-row-3 grid-flow-col gap-2">
        <div class="mt-6">
            <x-text-input id="form.productid" wire:model="form.productid" label="Name" :disabled="false" type="text" />
            <x-text-input id="form.client" wire:model="form.client" label="Url" :disabled="false" type="text" />
            <x-text-input id="form.days" wire:model="form.days" label="Icon" :disabled="false" type="number" />
        </div>
        <div class="mt-6">
            <x-text-input id="form.licensecount" wire:model="form.licensecount" label="Orders" :disabled="false"
                type="number" />
            <x-text-input id="form.productcode" wire:model="form.productcode" label="Level Menu" :disabled="false"
                type="text" />
            <x-text-input id="form.wording" wire:model="form.wording" label="Main Menu" :disabled="false" type="text" />
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3">
            {{ __('Submit') }}
        </x-danger-button>
    </div>

</form>