<label for="{{ isset($id) ? $id : 'switch' }}" class="relative w-[42px] h-6 cursor-pointer">
    <input type="checkbox" {{ $attributes }}
        class="peer sr-only [&:checked_+_span_svg[data-checked-icon]]:block [&:checked_+_span_svg[data-unchecked-icon]]:hidden" />

    <span
        class="absolute inset-y-0 z-10 inline-flex items-center justify-center w-4 h-4 m-1 text-gray-400 dark:text-gray-700 transition-all bg-white rounded-full start-0 peer-checked:start-[18px] peer-checked:text-red-600">
        <x-ri-close-fill data-unchecked-icon class="w-3 h-3" />
        <x-ri-check-fill class="hidden w-3 h-3" data-checked-icon />
    </span>

    <span
        class="absolute inset-0 transition bg-gray-300 rounded-full dark:bg-gray-600 peer-checked:bg-red-500 dark:peer-checked:bg-red-700"></span>
</label>
