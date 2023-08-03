{{-- https://github.com/Laratipsofficial/laravel-flatpickr --}}

<div id="{{ $containerId() }}" class="relative w-full flatpickr-container" data-te-input-wrapper-init>
    <input type="text" id="{{ $id }}"
        {{ $attributes->class(['flatpickr-input form-input peer border-none']) }} data-selector-id="{{ $selectorId() }}"
        data-config='@json($config())' data-disable-weekend="{{ $disableWeekend ? 1 : 0 }}" data-input
        placeholder="{{ $label }}" />
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
    @if ($clearable)
        <a id="{{ $id }}-clearable" title="clear" class="border-none flatpickr-clearable" data-clear>
            <x-ri-close-fill class="w-5 h-5" />
        </a>
    @endif
</div>
