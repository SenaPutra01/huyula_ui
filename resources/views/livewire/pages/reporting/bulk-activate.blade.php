<form wire:submit.prevent="activateBulkFunc" class="p-6">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium text-gray-800">
            {{ __('Bulk Activate') }}
        </h2>
    </div>

    <div class="flex items-center justify-center w-full mt-3">

        <label for="bulkActivate-file" wire:loading.attr='disabled'
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">

                @if ($activateBulk)
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">File name: <span class="font-semibold">{{
                        $activateBulk->getClientOriginalName() }}</span></p>
                <span wire:loading>
                    {{ __('Processing...') }}
                </span>
                @else
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span>
                    or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                <span wire:loading>
                    {{ __('Processing...') }}
                </span>
                @endif
                @error('activateBulk')
                <span class="text-red-500">{{ $message }}</span> <!-- Menampilkan pesan kesalahan -->
                @enderror
            </div>

            <input id="bulkActivate-file" type="file" wire:model='activateBulk' class="hidden" />
        </label>
    </div>
    <div class="flex justify-between">
        <div class="mt-6">
            <a href="{{ route('bulk.activateFormat') }}" type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Download
                Format</a>
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:loading.attr="disabled">
                <span wire:loading.remove>
                    {{ __('Submit') }}
                </span>
                <span wire:loading>
                    {{ __('Processing...') }}
                </span>
            </x-danger-button>
        </div>
    </div>
</form>