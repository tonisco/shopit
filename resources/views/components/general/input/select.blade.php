<div class="flex flex-col w-full gap-2">
    <div class="input-wrapper">
        <select {{ $attributes->class(['select-input peer/select'])->except(['options']) }}>
            <option>Select</option>
            @isset($options)
                @foreach ($options as $option)
                    <option value="{{ $option->id }}"> {{ $option->name }} </option>
                @endforeach
            @endisset
        </select>

        <label class="select-input-label"
            @isset($id) for="{{ $id }}" @endisset>{{ $label }}</label>
    </div>

    @isset($name)
        @error($name)
            <x-general.input.input-error :messages="$message" />
        @enderror
    @endisset
</div>

{{-- TODO:  try to change over state of option  --}}
