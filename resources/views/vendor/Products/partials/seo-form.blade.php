@php
    $seo_title = isset($product->seo_title) ? $product->seo_title : old('seo_title');
    $seo_description = isset($product->seo_description) ? $product->seo_description : old('seo_description');
@endphp

<div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div>
        <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Search engine
            optimization
        </h2>
        <p class="text-sm text-gray-500">Provide information that will help improve the snippet and
            bring your product to the top of search engines.</p>
    </div>

    <div class="flex flex-col w-full gap-2">
        <div class="relative" data-te-input-wrapper-init>
            <input class="form-input peer"
                value="{{ isset($product->seo_title) ? $product->seo_title : old('seo_title') }}" type="number"
                name="seo_title" id="seo_title">
            <label class="form-label" for="seo_title">Seo Title</label>
        </div>
        @error('seo_title')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    <div class="flex flex-col w-full gap-2">
        <div class="relative" data-te-input-wrapper-init>
            <textarea class="form-input peer" name="seo_description" id="seo_description" cols="30" rows="3">
				{{ isset($product->seo_description) ? $product->seo_description : old('seo_description') }}
			</textarea>
            <label class="form-label" for="seo_description">Seo
                Description</label>
        </div>
        @error('seo_description')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>
</div>
