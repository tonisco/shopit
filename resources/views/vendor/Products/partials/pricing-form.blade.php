<div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md w2 dark:bg-gray-800">
    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Pricing</h2>

    <div class="flex flex-col w-full gap-2">
        <div class="relative" data-te-input-wrapper-init>
            <input required class="form-input peer" value="{{ isset($product->price) ? $product->price : old('price') }}"
                placeholder="Price $" type="number" name="price" id="price">
            <label class="form-label" for="price">Price $</label>
        </div>
        @error('price')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    <div class="flex flex-col w-full gap-2">
        <div class="relative" data-te-input-wrapper-init>
            <input class="form-input peer"
                value="{{ isset($product->discount) ? $product->discount : old('discount') }}" type="number"
                name="discount" id="discount">
            <label class="form-label" for="discount">Discount %</label>
        </div>
        @error('discount')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    {{-- TODO: fix date range for mobile screens and dark mode background --}}
    <div class="flex flex-col w-full gap-2">
        <x-utils.date-picker show-time :time24hr="false" min-date="today" label="Discount Date Range" clearable range
            name="discount_date" {{-- value="{{ isset($product->discount_start_date && $product->discount_end_date) ? $product->discount_start_date . ' to ' . $product->discount_end_date : old('discount_date') }}"  --}} />
        @error('discount_date')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>
</div>
