<div
    class="shadow-lg bg-white relative dark:bg-gray-800 cursor-pointer rounded h-[420px] overflow-hidden grid grid-rows-[73%_37%]">
    <img src="{{ asset($product->image) }}" class="h-full w-full object-cover" alt="{{ $product->name }}">
    <div class="py-2 px-3 flex flex-col gap-1 ">
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->category->name }} @if ($product->subCategory)
                , {{ $product->subCategory->name }}
            @endif
        </p>
        <p class="text-gray-900 dark:text-gray-200 text-sm">{{ $product->name }}</p>
        <div class="flex gap-2">
            <div class="flex gap-1">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($product->ratings >= $i)
                        <x-ri-star-fill class='h-3 w-3 text-yellow-500 dark:text-yellow-700' />
                    @elseif ($product->ratings >= $i - 0.5)
                        <x-ri-star-half-fill class='h-3 w-3 text-yellow-500 dark:text-yellow-700' />
                    @else
                        <x-ri-star-fill class='h-3 w-3 text-gray-500 dark:text-gray-400' />
                    @endif
                @endfor

            </div>
            <p class="text-xs text-gray-500 dark:text-gray-400">({{ $product->total_reviews }})
            </p>
        </div>
        <h3 class="text-red-500 dark:text-red-700 font-semibold text-lg">${{ $product->price }}</h3>
    </div>
    <p class="absolute capitalize top-3 text-white left-3 py-1 px-2 text-xs rounded-full bg-red-500 dark:bg-red-700">new
    </p>
    <p class="absolute top-3 capitalize text-white right-3 py-1 px-2 text-xs rounded-full bg-blue-500 dark:bg-blue-700">
        -10%</p>
</div>
