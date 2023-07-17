<section class="flex flex-col justify-between w-full gap-8 md:flex-row">
    <div class="flex flex-col items-start w-full gap-3 md:w-1/2">
        <div class=" h-auto w-full max-w-[550px] !ml-0 swiper">
            <div class="w-full h-full swiper-wrapper">

                @for ($i = 0; $i < 4; $i++)
                    <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                        class="object-cover rounded-lg swiper-slide aspect-square" />
                @endfor
            </div>

            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>


        {{-- TODO: fix tap to change slider, thumbnail on lower screens --}}
        <div thumbsSlider="" class="w-full max-w-[550px] h-20 aspect-square swiper1">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < 4; $i++)
                    <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                        class="object-cover w-auto h-20 rounded-lg cursor-pointer aspect-square swiper-slide" />
                @endfor
            </div>
        </div>

        {{-- <div class="flex flex-wrap gap-4">

            <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                class="object-cover w-20 rounded-lg cursor-pointer aspect-square" />

            <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                class="object-cover w-20 rounded-lg cursor-pointer aspect-square" />

            <img alt="{{ $product->name }}" src="{{ asset($product->image) }}"
                class="object-cover w-20 rounded-lg cursor-pointer aspect-square" />
        </div> --}}
    </div>

    <div class="w-full md:w-1/2">
        <div class="flex justify-between gap-2">
            <div class="max-w-[35ch] space-y-2">
                <h1 class="text-xl font-bold text-gray-900 sm:text-2xl dark:text-gray-200">
                    {{ $product->name }}
                </h1>

                <p class="text-sm text-gray-900 dark:text-gray-200">Highest Rated Product</p>

                <div class="flex gap-2">
                    <x-utils.stars :rating="$product->ratings" size="w-5 h-5" />
                    <p class="text-gray-800 dark:text-gray-200">({{ $product->total_reviews }}) Reviews</p>
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
                        <input type="radio" name="color" id="color_tt" class="sr-only peer" />

                        <span
                            class="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            Texas Tea
                        </span>
                    </label>

                    <label for="color_fr" class="cursor-pointer">
                        <input type="radio" name="color" id="color_fr" class="sr-only peer" />

                        <span
                            class="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            Fiesta Red
                        </span>
                    </label>

                    <label for="color_cb" class="cursor-pointer">
                        <input type="radio" name="color" id="color_cb" class="sr-only peer" />

                        <span
                            class="inline-block px-3 py-1 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            Cobalt Blue
                        </span>
                    </label>
                </div>
            </fieldset>

            <fieldset class="mt-4">
                <legend class="mb-1 text-sm font-medium">Size</legend>

                <div class="flex flex-wrap gap-1">
                    <label for="size_xs" class="cursor-pointer">
                        <input type="radio" name="size" id="size_xs" class="sr-only peer" />

                        <span
                            class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            XS
                        </span>
                    </label>

                    <label for="size_s" class="cursor-pointer">
                        <input type="radio" name="size" id="size_s" class="sr-only peer" />

                        <span
                            class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            S
                        </span>
                    </label>

                    <label for="size_m" class="cursor-pointer">
                        <input type="radio" name="size" id="size_m" class="sr-only peer" />

                        <span
                            class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            M
                        </span>
                    </label>

                    <label for="size_l" class="cursor-pointer">
                        <input type="radio" name="size" id="size_l" class="sr-only peer" />

                        <span
                            class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            L
                        </span>
                    </label>

                    <label for="size_xl" class="cursor-pointer">
                        <input type="radio" name="size" id="size_xl" class="sr-only peer" />

                        <span
                            class="inline-flex items-center justify-center w-8 h-8 text-xs font-medium border rounded-full group peer-checked:bg-black peer-checked:text-white">
                            XL
                        </span>
                    </label>
                </div>
            </fieldset>
            <div class="my-5">
                <label for="quantity" class="sr-only">Qty</label>
                <div class="flex items-center gap-2">
                    <button class="px-4 py-2 text-white bg-gray-400 rounded-xl">-</button>
                    <input type="number" id="quantity" min="1" value="1"
                        class="w-12 rounded border-gray-200 py-3 text-center text-xs [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                    <button class="px-4 py-2 text-white bg-gray-400 rounded-xl">+</button>
                </div>
            </div>

            <button type="submit"
                class="block px-5 py-3 text-xs font-medium text-white bg-red-500 rounded dark:bg-red-700 hover:bg-red-600">
                Add to Cart
            </button>
        </form>
    </div>
</section>
