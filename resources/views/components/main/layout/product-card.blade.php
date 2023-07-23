<div class="relative h-[460px] w-full group/productcard">
    <a href="{{ route('productsDetails', $product->id) }}"
        class="shadow-lg hover:shadow-lg lg:shadow-none mx-auto w-full bg-white max-w-sm relative dark:bg-gray-800 cursor-pointer rounded-lg h-full overflow-hidden grid grid-rows-[65%_35%]">
        <div class="w-full h-full overflow-hidden">
            <img src="{{ asset($product->image) }}"
                class="object-cover w-full h-full transition-all duration-500 ease-out group-hover/productcard:scale-110"
                alt="{{ $product->name }}">
        </div>
        <div class="flex flex-col gap-1 px-3 py-2 ">
            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $product->category->name }} @if ($product->subCategory)
                    , {{ $product->subCategory->name }}
                @endif
            </p>
            <p class="text-sm font-semibold text-gray-900 dark:text-gray-200">{{ $product->name }}</p>
            <div class="flex gap-2">
                <x-utils.stars :rating="$product->product_reviews_avg_rating" />

                <p class="text-xs text-gray-500 dark:text-gray-400">({{ $product->product_reviews_count }})
                </p>
            </div>
            <h3 class="text-lg font-semibold text-red-500 dark:text-red-700">${{ $product->price }}</h3>
            <button class="px-3 py-2 mt-2 text-xs text-white capitalize bg-red-500 rounded-full dark:bg-red-700">Add
                to cart</button>
        </div>
    </a>
    <p class="absolute px-2 py-1 text-xs text-white capitalize bg-red-500 rounded-full top-3 left-3 dark:bg-red-700">
        new
    </p>
    <div class="absolute flex flex-col items-end gap-3 top-3 right-3">
        <p class="px-2 py-1 text-xs text-white capitalize bg-blue-500 rounded-full dark:bg-blue-700">
            -10%</p>
        <p
            class="block p-1 text-xs text-blue-500 capitalize bg-transparent bg-white rounded-lg shadow opacity-100 cursor-pointer lg:hidden lg:opacity-0 group-hover/productcard:opacity-100 group-hover/productcard:block hover:text-blue-600">
            <x-ri-heart-fill class="w-6 h-6" />
            <x-layout.modal id="{{ $product->slug }}">
                <x-layout.product-description :product="$product" />
            </x-layout.modal>
        </p>
        <p class="block p-1 text-xs text-red-500 capitalize bg-transparent bg-white rounded-lg shadow opacity-100 cursor-pointer lg:hidden lg:opacity-0 group-hover/productcard:opacity-100 group-hover/productcard:block dark:text-red-700 hover:text-red-600"
            data-te-toggle="modal" data-te-target="#{{ $product->slug }}" data-te-ripple-init
            data-te-ripple-color="light">
            <x-ri-eye-fill class="w-6 h-6" />

        </p>
    </div>
</div>
