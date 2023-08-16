<label for="{{ $id }}"
    class="relative block rounded border border-gray-300 dark:border-gray-600 h-11 shadow-sm focus-within:border-red-500 dark:focus-within:border-red-700 focus-within:ring-1 focus-within:ring-red-500 dark:focus-within:ring-red-700">
    <input
        {{ $attributes->class(['peer border-none bg-transparent dark:text-gray-200 text-base h-full w-full py-[0.32rem] px-3 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0']) }}
        class=placeholder="{{ $label }}" />

    <span
        class="pointer-events-none capitalize absolute start-2 top-0 -translate-y-1/2 bg-white dark:bg-gray-800 p-1 text-[0.8rem] dark:text-gray-400 text-gray-500 transition-all duration-200 peer-placeholder-shown:top-1/2 peer-placeholder-shown:font-normal peer-placeholder-shown:text-base peer-focus:top-0 peer-focus:text-[0.8rem] peer-focus:text-red-500 dark:peer-focus:text-red-700">
        {{ $label }}
    </span>
</label>
