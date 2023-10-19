<div class="flex gap-1">
    @for ($i = 1; $i <= 5; $i++)
        @if ($rating >= $i)
            <x-ri-star-fill class="{{ $size ?? 'h-3 w-3' }} text-brandYellow dark:text-brandYellowDark" />
        @elseif ($rating >= $i - 0.5)
            <x-ri-star-half-fill class="{{ $size ?? 'h-3 w-3' }} text-brandYellow dark:text-brandYellowDark" />
        @else
            <x-ri-star-fill class="{{ $size ?? 'h-3 w-3' }} text-gray-500 dark:text-gray-400" />
        @endif
    @endfor
</div>
