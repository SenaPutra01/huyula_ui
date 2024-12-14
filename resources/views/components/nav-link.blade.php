@props(['active'])

@php
$classes = ($active ?? false)
? 'active '
: '';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes, 'style' => $active ? 'background: linear-gradient(107.2deg, rgb(150,
        15,
        15) 10.6%, rgb(247, 0, 0) 91.1%);' : '']) }} href="JavaScript:void(0)">
        <span class="menu-title" data-i18n="Dashboard">{{ $slot }}</span>
    </a>
</li>