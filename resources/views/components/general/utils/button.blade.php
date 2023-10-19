<button
    {{ $attributes->class([
            'bg-brandRed dark:bg-brandRedDark hover:bg-red-600 transition-all capitalize rounded text-white px-5 py-2 text-center focus:ring-4 ring-red-200 dark:ring-brandRed/40',
        ])->except('text') }}>
    {{ $text }}
</button>
