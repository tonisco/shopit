<div
    class="shadow-lg hover:shadow-lg lg:shadow-none mx-auto w-full group/productcard bg-white max-w-sm relative dark:bg-gray-800 cursor-pointer rounded-lg h-[460px] overflow-hidden grid grid-rows-[65%_35%]">
    <div class="overflow-hidden h-full w-full">
        <img src="{{ asset($product->image) }}"
            class="h-full group-hover/productcard:scale-110 transition-all duration-500 ease-out w-full object-cover"
            alt="{{ $product->name }}">
    </div>
    <div class="py-2 px-3 flex flex-col gap-1 ">
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->category->name }} @if ($product->subCategory)
                , {{ $product->subCategory->name }}
            @endif
        </p>
        <p class="text-gray-900 dark:text-gray-200 text-sm font-semibold">{{ $product->name }}</p>
        <div class="flex gap-2">
            <x-utils.stars :rating="$product->ratings" />

            <p class="text-xs text-gray-500 dark:text-gray-400">({{ $product->total_reviews }})
            </p>
        </div>
        <h3 class="text-red-500 dark:text-red-700 font-semibold text-lg">${{ $product->price }}</h3>
        <button class="capitalize mt-2 text-white py-2 px-3 text-xs rounded-full bg-red-500 dark:bg-red-700">Add
            to cart</button>
    </div>
    <p class="absolute capitalize top-3 text-white left-3 py-1 px-2 text-xs rounded-full bg-red-500 dark:bg-red-700">new
    </p>
    <div class="absolute top-3 right-3 flex-col flex gap-3 items-end">
        <p class=" capitalize text-white py-1 px-2 text-xs rounded-full bg-blue-500 dark:bg-blue-700">
            -10%</p>
        <p
            class="capitalize bg-white shadow p-1 block lg:hidden lg:opacity-0 opacity-100 group-hover/productcard:opacity-100 group-hover/productcard:block text-xs rounded-lg bg-transparent text-blue-500 hover:text-blue-600">
            <x-ri-heart-fill class="h-6 w-6" />
            <x-layout.modal id="{{ $product->slug }}" :product="$product">
                <x-layout.productdetails :product="$product" :name="$product->name" :modal="true" />
            </x-layout.modal>
        </p>
        <p class="capitalize bg-white shadow p-1 block lg:hidden lg:opacity-0 opacity-100 group-hover/productcard:opacity-100 group-hover/productcard:block text-xs rounded-lg bg-transparent text-red-500 dark:text-red-700 hover:text-red-600"
            data-te-toggle="modal" data-te-target="#{{ $product->slug }}" data-te-ripple-init
            data-te-ripple-color="light">
            <x-ri-eye-fill class="h-6 w-6" />

        </p>
    </div>
</div>
