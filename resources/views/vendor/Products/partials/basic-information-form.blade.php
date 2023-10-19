<div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-brandDark">
    <h2 class="text-lg font-medium text-brandDark capitalize dark:text-brandLight">Basic Information
    </h2>

    <div class="flex flex-col w-full gap-2">
        <div class="relative" data-te-input-wrapper-init>
            <input required type="text"name="name" id="name" placeholder="Name" class="form-input peer"
                value="{{ isset($product->name) ? $product->name : old('name') }}">
            <label for="name" class="form-label">Name</label>
        </div>
        @error('name')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    <div class="flex flex-col w-full gap-2">
        <div class="relative" data-te-input-wrapper-init>
            <textarea class="form-input peer" required name="short_description" id="short_description" cols="30"
                rows="5">{{ isset($product->short_description) ? $product->short_description : old('short_description') }}</textarea>
            <label class="form-label" for="short_description">Short
                Description</label>
        </div>
        @error('short_description')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

    <div class="relative flex flex-col w-full gap-2">
        <div class="w-full overflow-hidden rounded editor" x-data="editor('long_description', '{{ isset($product->long_description) ? $product->long_description : old('long_description') }}')">
            <textarea class="hidden" name="long_description" id="long_description" cols="30" rows="10"></textarea>
            <div id="editor" x-ref='editor'></div>
            <label
                class="text-[13px] bg-white des transition-all duration-200 dark:bg-brandDark p-1.5 text-brandGrayDark dark:text-brandLight absolute -top-4 left-3 max-w-[90%]">Long
                Description</label>
        </div>
        @error('long_description')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>
</div>
