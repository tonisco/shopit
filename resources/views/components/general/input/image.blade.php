@php
    $imageId = isset($imageId) ? $imageId : '';
    $image = isset($image) ? $image : '';
@endphp

<div class="relative w-full h-full rounded-lg bg-gray-50 dark:bg-brandDarker" x-data="imagePreview('{{ $image }}')">
    <label for="{{ $id }}">
        <div class="w-full h-full p-2">
            <div
                class="flex flex-col items-center justify-center w-full h-full gap-4 text-sm border-2 border-brandRed border-dashed rounded-lg cursor-pointer">
                <x-ri-image-2-line class="w-6 h-6 text-brandLight sm:w-8 sm:h-8 dark:text-brandGrayDark" />
            </div>
        </div>

        <template x-if="image_url">
            <img :src="image_url" alt="{{ $name }}"
                class="object-cover absolute top-0 left-0 w-full h-full rounded-lg cursor-pointer">
        </template>

    </label>
    @if (!isset($isMain))
        <template x-if="image_url"><x-ri-delete-bin-6-line @click.stop="clear({{ $id }},{{ $imageId }})"
                class="absolute z-10 w-5 h-5 text-brandRed top-3 right-3 dark:text-brandRedDark" /></template>

        @if ($image && $imageId)
            <input type="text" name="delete_{{ $name }}" accept="image/*" id="delete_{{ $id }}"
                x-model="deleteValue" class="hidden">
        @endif
    @endif
    <input type="file" name="{{ $name }}" accept="image/*" x-on:change="change(event,{{ $imageId }})"
        class="hidden" id="{{ $id }}">
</div>
