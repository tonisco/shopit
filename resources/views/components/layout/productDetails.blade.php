@php
    $products = \App\Models\Product::where('approved', true)->paginate(4);
@endphp

<section class="flex flex-col gap-8 w-full justify-between md:flex-row">
    <div class="flex flex-col items-start gap-3 w-full md:w-1/2">
        <div class=" h-auto w-[550px] !ml-0 swiper">
            <div class="swiper-wrapper w-full h-full">

                @foreach ($products as $item)
                    <img alt="{{ $product->name }}" src="{{ asset($item->image) }}"
                        class="swiper-slide aspect-square rounded-lg object-cover" />
                @endforeach
            </div>

            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            {{-- <div class="swiper-scrollbar"></div> --}}
        </div>

        <div thumbsSlider="" class="w-[550px] h-20 aspect-square swiper1">
            <div class="swiper-wrapper">
                @foreach ($products as $item)
                    <img alt="{{ $item->name }}" src="{{ asset($item->image) }}"
                        class="aspect-square h-20 w-20 rounded-lg cursor-pointer swiper-slide object-cover" />
                @endforeach
            </div>
        </div>

        {{-- <div class="flex gap-4 flex-wrap">

            <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                class="aspect-square w-20 rounded-lg cursor-pointer object-cover" />

            <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                class="aspect-square w-20 rounded-lg cursor-pointer object-cover" />

            <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                class="aspect-square w-20 rounded-lg cursor-pointer object-cover" />
        </div> --}}
    </div>

    <div class="w-full md:w-1/2">
        <div class="mt-8 flex justify-between">
            <div class="max-w-[35ch] space-y-2">
                <h1 class="text-xl font-bold sm:text-2xl text-gray-900 dark:text-gray-200">
                    {{ $product->name }}
                </h1>

                <p class="text-sm text-gray-900 dark:text-gray-200">Highest Rated Product</p>

                <div class="-ms-0.5 flex">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($product->ratings >= $i)
                            <x-ri-star-fill class='h-5 w-5 text-yellow-500 dark:text-yellow-700' />
                        @elseif ($product->ratings >= $i - 0.5)
                            <x-ri-star-half-fill class='h-5 w-5 text-yellow-500 dark:text-yellow-700' />
                        @else
                            <x-ri-star-fill class='h-5 w-5 text-gray-500 dark:text-gray-400' />
                        @endif
                    @endfor

                </div>
            </div>

            <p class="text-lg font-bold text-gray-900 dark:text-gray-200">${{ $product->price }}</p>
        </div>

        <p class="mt-4 text-gray-900 dark:text-gray-200">
            {{ $product->short_description }}
        </p>

        <form class="mt-8">
            <fieldset>
                <legend class="mb-1 text-sm font-medium">Color</legend>

                <div class="flex flex-wrap gap-1">
                    <label for="color_tt" class="cursor-pointer">
                        <input type="radio" name="color" id="color_tt" class="peer sr-only" />

                        <span
                            class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            Texas Tea
                        </span>
                    </label>

                    <label for="color_fr" class="cursor-pointer">
                        <input type="radio" name="color" id="color_fr" class="peer sr-only" />

                        <span
                            class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            Fiesta Red
                        </span>
                    </label>

                    <label for="color_cb" class="cursor-pointer">
                        <input type="radio" name="color" id="color_cb" class="peer sr-only" />

                        <span
                            class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            Cobalt Blue
                        </span>
                    </label>
                </div>
            </fieldset>

            <fieldset class="mt-4">
                <legend class="mb-1 text-sm font-medium">Size</legend>

                <div class="flex flex-wrap gap-1">
                    <label for="size_xs" class="cursor-pointer">
                        <input type="radio" name="size" id="size_xs" class="peer sr-only" />

                        <span
                            class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            XS
                        </span>
                    </label>

                    <label for="size_s" class="cursor-pointer">
                        <input type="radio" name="size" id="size_s" class="peer sr-only" />

                        <span
                            class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            S
                        </span>
                    </label>

                    <label for="size_m" class="cursor-pointer">
                        <input type="radio" name="size" id="size_m" class="peer sr-only" />

                        <span
                            class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            M
                        </span>
                    </label>

                    <label for="size_l" class="cursor-pointer">
                        <input type="radio" name="size" id="size_l" class="peer sr-only" />

                        <span
                            class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            L
                        </span>
                    </label>

                    <label for="size_xl" class="cursor-pointer">
                        <input type="radio" name="size" id="size_xl" class="peer sr-only" />

                        <span
                            class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                            XL
                        </span>
                    </label>
                </div>
            </fieldset>
            <div class="my-5">
                <label for="quantity" class="sr-only">Qty</label>
                <div class="flex items-center gap-2">
                    <button class="bg-gray-400 py-2 px-4 text-white rounded-xl">-</button>
                    <input type="number" id="quantity" min="1" value="1"
                        class="w-12 rounded border-gray-200 py-3 text-center text-xs [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                    <button class="bg-gray-400 py-2 px-4 text-white rounded-xl">+</button>
                </div>
            </div>

            <button type="submit"
                class="block rounded bg-red-500 dark:bg-red-700 px-5 py-3 text-xs font-medium text-white hover:bg-red-600">
                Add to Cart
            </button>
        </form>
    </div>
</section>
