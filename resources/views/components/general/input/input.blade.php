<div class="flex flex-col w-full gap-2">
    <label for="{{ $id ?? $name }}" class="input-wrapper">
        <input type="text" id="{{ $id }}" placeholder="{{ $label }}"
            {{ $attributes->class(['peer/input text-input']) }}>

        <span class="text-input-label">{{ $label }}</span>
    </label>

    @isset($name)
        @error($name)
            <x-general.input.input-error :messages="$message" />
        @enderror
    @endisset
</div>
