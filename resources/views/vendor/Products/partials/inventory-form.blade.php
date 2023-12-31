@php
    $qty = isset($product->qty) ? $product->qty : old('qty');
    $useVariant = isset($product->productVariant) ? true : old('use_variant') === 'on';
@endphp

<div id="inventory-form" class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-brandDark"
    x-data="toggler({{ $useVariant }})">
    <h2 class="text-lg font-medium text-brandDark capitalize dark:text-brandLight">Inventory</h2>

    <div class="flex items-center gap-2">
        <x-general.input.switch id="variant" x-model="open" name="use_variant" />
        <label for="variant" class="font-medium text-brandDark capitalize dark:text-brandLight">Use
            Variant</label>
    </div>

    <div class="flex flex-col w-full gap-2" x-cloak x-show="!open">
        <div class="relative" data-te-input-wrapper-init>
            <input :required="!open" class="form-input peer disabled:bg-brandLighter" value="{{ $qty }}"
                type="number" name="qty" id="qty">
            <label class="form-label" for="qty">Stock Quantity</label>
        </div>
        @error('qty')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    @if (isset($product->productVariant))
        <a x-cloak x-show="open"
            class="self-start px-4 py-1.5 text-white capitalize bg-brandRed rounded-lg dark:bg-brandRedDark"
            href="{{ route('vendor.products.variants.edit', ['product' => $product->id, 'variant' => $product->productVariant->id]) }}">Edit
            Variant</a>
    @else
        @include('vendor.Products.partials.create-variation')
    @endif
</div>
