@php
    $qty = isset($product->qty) ? $product->qty : old('qty');
@endphp

<div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Inventory</h2>

    <div class="flex flex-col w-full gap-2">
        <div class="relative" data-te-input-wrapper-init>
            <input required class="form-input peer" value="{{ $qty }}" type="number" name="qty" id="qty">
            <label class="form-label" for="qty">Stock Quantity</label>
        </div>
        @error('qty')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>
</div>
