<div class="flex flex-col w-full gap-2">
    <div class="input-wrapper textarea-wrapper">
        <textarea placeholder="{{ $name }}" cols="30" rows="6"
            {{ $attributes->class(['textarea-input peer/input']) }}>
@isset($value)
{{ $value }}
@endisset
</textarea>

        <label for="{{ $id ?? $name }}" class="text-input-label">{{ $label }}</label>
    </div>

    @isset($name)
        @error($name)
            <x-general.input.input-error :messages="$message" />
        @enderror
    @endisset
</div>
