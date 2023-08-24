@php
    $qty = isset($product->qty) ? $product->qty : old('qty');
    $useVariant = isset($product->productVariants) ? count($product->productVariants) > 0 : old('use_variant') === 'on';
@endphp

<div id="inventory-form" class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
    x-data="toggler({{ $useVariant }})">
    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Inventory</h2>

    <div class="flex items-center gap-2">
        <x-general.input.switch id="variant" x-model="open" name="use_variant" />
        <label for="variant" class="font-medium text-gray-800 capitalize dark:text-gray-200">Use
            Variant</label>
    </div>

    <div class="flex flex-col w-full gap-2" x-show="!open">
        <div class="relative" data-te-input-wrapper-init>
            <input :required="!open" class="form-input peer disabled:bg-gray-100" value="{{ $qty }}"
                type="number" name="qty" id="qty">
            <label class="form-label" for="qty">Stock Quantity</label>
        </div>
        @error('qty')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    @if (isset($product))
        @include('vendor.Products.partials.edit-variation')
    @else
        @include('vendor.Products.partials.create-variation')
    @endif
</div>
