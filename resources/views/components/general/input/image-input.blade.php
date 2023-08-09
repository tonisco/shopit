<div class="relative w-full h-full bg-gray-100 rounded-lg dark:bg-gray-900" x-data="imagePreview">
    <label for="{{ $id }}">
        <template x-if="!image_url">
            <div class="w-full h-full p-2">
                <div
                    class="flex flex-col items-center justify-center w-full h-full gap-4 text-sm border-2 border-red-500 border-dashed rounded-lg cursor-pointer">
                    <x-ri-image-2-line class="w-6 h-6 text-gray-400 sm:w-8 sm:h-8 dark:text-gray-200" />
                </div>
            </div>
        </template>

        <template x-if="image_url">
            <img :src="image_url" alt="{{ $name }}"
                class="object-cover w-full h-full rounded-lg cursor-pointer">
        </template>

    </label>
    <template x-if="image_url"><x-ri-delete-bin-6-line @click.stop="clear({{ $id }})"
            class="absolute z-10 w-5 h-5 text-red-500 top-3 right-3 dark:text-red-700" /></template>
    <input type="file" name="{{ $name }}" accept="image/*" x-on:change="change(event)" class="hidden"
        id="{{ $id }}">
</div>
