@php
    $category_id = isset($product->category_id) ? $product->category_id : old('category');
    $sub_category_id = isset($product->sub_category_id) ? $product->sub_category_id : old('sub_category');
    $brand_id = isset($product->brand_id) ? $product->brand_id : old('brand');
@endphp

<div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Group</h2>

    <div class="flex flex-col w-full gap-2">
        <div class="flex-1">
            <select required data-te-select-init data-te-select-size="lg" name="category" id="category"
                x-on:change="setSubCategory($event.target.value)">
                <option>Select</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $category_id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <label data-te-select-label-ref for="category">Category</label>
        </div>
        @error('category')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    <div class="flex flex-col w-full gap-2">
        <div class="flex-1">
            <select required data-te-select-init data-te-select-size="lg" name="sub_category" id="sub_category">
                <option>Select</option>
                {{-- TODO: fix this 😡  edit --}}
                <template x-for="subCategory in subCategories">
                    <option :value="subCategory.id" :selected="subCategory.id == {{ $sub_category_id }}"
                        x-text="subCategory.name"></option>
                </template>
            </select>
            <label data-te-select-label-ref for="sub_category">Sub
                Category</label>
        </div>
        @error('sub_category')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    <div class="flex flex-col w-full gap-2">
        <select required data-te-select-init data-te-select-size="lg" name="brand" id="brand">
            <option>Select</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" @if ($brand->id == $brand_id) selected @endif>
                    {{ $brand->name }}</option>
            @endforeach
        </select>
        <label data-te-select-label-ref for="brand">Brand</label>
        @error('brand')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

</div>
