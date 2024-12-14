{{-- @props(['id' => null])
<div class="modal mt-5" style="max-height: 100%; overflow: visible">

    <div class="modal-content" id="{{ $id }}">
        <h1 class="mb-5"><strong>{{ $modalHeader }}</strong></h1>

        {{ $slot }}
    </div>
</div> --}}


@props(['id'])

<div class="modal mt-5" style="max-height: 100%; overflow: visible">
    <div class="modal-content" id="{{ $id }}">
        <h1 class="mb-5"><strong>sample</strong></h1>
        {{ $slot }}
    </div>
    {{-- <div class="modal-footer container mb-5">
        {{ $footer }}
    </div> --}}
</div>