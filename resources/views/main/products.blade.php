<x-main.layout.main page="Products">
    <x-main.layout.breadcrumbs heading='products' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'product']]" />
    <div class="flex w-full gap-6 px-2 mx-auto my-10 max-w-7xl">
        <div class="flex-col hidden w-1/5 gap-4 lg:flex">
            <div class="flex flex-col gap-2 p-4 bg-white border border-brandLight rounded-lg dark:bg-brandDark">
                <h3 class="text-lg font-semibold text-brandDark dark:text-brandLight">Categories</h3>
                <x-general.layout.accordion id='product-filter' :categories="$categories" />
            </div>

            <div class="p-4 bg-white border border-brandLight rounded-lg dark:bg-brandDark">
                <form action="{{ request()->fullUrlWithQuery([]) }}" class="flex flex-col gap-4">
                    <h3 class="text-lg font-semibold text-brandDark dark:text-brandLight">Price</h3>
                    <div class="px-1">
                        <x-general.input.range :min="100" :max="10000" />
                    </div>
                    <div class="flex gap-4 px-2">
                        <button
                            class="px-3 py-1 text-sm text-white capitalize bg-brandRed rounded-lg dark:bg-brandRedDark">filter</button>
                        <button
                            class="px-3 py-1 text-sm text-brandRed capitalize bg-white border-2 border-brandRed rounded-lg dark:bg-brandRedDark dark:border-brandRedDark">reset</button>

                    </div>
                </form>
            </div>

            <x-main.utils.brands-filter :brands="$brands" />
            <div class="flex flex-col gap-2 p-4 bg-white border border-brandLight rounded-lg dark:bg-brandDark">
                <h3 class="text-lg font-semibold text-brandDark dark:text-brandLight">Ratings</h3>
                <div class="flex flex-col gap-4 px-1">
                    @for ($i = 5; $i > 0; $i--)
                        @php
                            $rating_selected = request()->ratings == $i;
                            if ($rating_selected) {
                                $ratings_link = request()->fullUrlWithoutQuery(['ratings']);
                            } else {
                                $ratings_link = request()->fullUrlWithQuery(['ratings' => $i]);
                            }
                        @endphp

                        <a href="{{ $ratings_link }}" class="flex items-center gap-2">
                            <div
                                class="h-3 w-3 rounded-full items-center ring ring-brandRed dark:ring-brandRed @if ($rating_selected) bg-brandRed dark:bg-brandRedDark @endif">
                            </div>
                            <x-main.utils.stars :rating="$i" size="h-4 w-4" />

                        </a>
                    @endfor
                </div>
            </div>
        </div>
        <div class="w-full lg:w-4/5 ">
            <div>
            </div>
            <div class="grid w-full grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($products as $product)
                    <x-main.layout.product-card :product="$product" />
                @endforeach

            </div>
        </div>
    </div>
    <div class="w-full px-2 mx-auto my-10 max-w-7xl">
        {{ $products->onEachSide(0)->appends(request()->query())->links() }}

    </div>
</x-main.layout.main>
