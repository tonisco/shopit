<div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200"> Images</h2>

    <div
        class="grid gap-4 grid-cols-[repeat(auto-fit,minmax(80px,1fr))] sm:grid-cols-[repeat(auto-fit,minmax(128px,1fr))] sm:auto-rows-[144px] auto-rows-[96px] grid-rows-[repeat(auto-fill,96px)] sm:grid-rows-[repeat(auto-fill,144px)]">
        <div class="col-span-2 row-span-2">
            <x-general.input.image-input name="image" id="image"
                image="{{ isset($product->image) ? asset($product->image) : null }}" isMain />

            @error('image')
                <x-general.input.input-error :messages="$message" />
            @enderror
        </div>

        @for ($i = 1; $i <= 6; $i++)
            @if (isset($product->productImages[$i]))
                <x-general.input.image-input name="product_image{{ $i }}" id="product_image{{ $i }}"
                    imageId="{{ $product->productImages[$i]->id }}"
                    image="{{ asset($product->productImages[$i]->image) }}" />
            @else
                <x-general.input.image-input name="product_image{{ $i }}"
                    id="product_image{{ $i }}" />
            @endif
        @endfor

    </div>
</div>
