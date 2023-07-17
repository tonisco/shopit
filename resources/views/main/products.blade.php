@extends('layouts.app')

@section('content')
    <x-layout.breadcrumbs heading='products' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'product']]" />
    <div class="max-w-7xl w-full mx-auto px-2 my-10 flex gap-6">
        <div class="hidden lg:flex flex-col gap-4 w-1/5">
            <div class="flex flex-col gap-2 p-4 bg-white border rounded-lg border-gray-300 dark:bg-gray-800">
                <h3 class="text-lg text-gray-800 dark:text-gray-200 font-semibold">Categories</h3>
                <x-layout.accordion id='product-filter' :categories="$categories" />
            </div>

            <div class="flex flex-col gap-2 p-4 bg-white border rounded-lg border-gray-300 dark:bg-gray-800">
                <h3 class="text-lg text-gray-800 dark:text-gray-200 font-semibold">Ratings</h3>
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
                                class="h-3 w-3 rounded-full items-center ring ring-red-500 dark:ring-red-500 @if ($rating_selected) bg-red-500 dark:bg-red-700 @endif">
                            </div>
                            <x-utils.stars :rating="$i" size="h-4 w-4" />

                        </a>
                    @endfor
                </div>
            </div>
        </div>
        <div class="w-full lg:w-4/5 ">
            <div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full">
                @foreach ($products as $product)
                    <x-layout.productcard :product="$product" />
                @endforeach

            </div>
        </div>
    </div>
    <div class="max-w-7xl px-2 mx-auto my-10 w-full">
        {{ $products->appends(request()->query())->links() }}

    </div>
@endsection
