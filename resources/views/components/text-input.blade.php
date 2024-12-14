{{-- @props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700
focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
shadow-sm']) }}> --}}


@props(['disabled' => false, 'label' => '', 'type'])

<div class="input-field col s12">
    <input type="{{ $type }}" id="{{ $attributes->get('id') }}" wire:model="{{ $attributes->get('wire:model') }}"
        @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700
    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
    shadow-sm w-full']) }}
    >
    <label for="{{ $attributes->get('id') }}" class="text-gray-700 dark:text-gray-300">{{ $label }}</label>
    @error($attributes->get('wire:model'))
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>