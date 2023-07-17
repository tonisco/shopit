@php
    $categories = \App\Models\Category::with([
        'subCategories' => function ($query) {
            $query->where('status', 1);
        },
    ])
        ->where('status', true)
        ->get();
@endphp

<div class="static" data-te-nav-item-ref data-te-dropdown-ref>
    <a class="items-center mr-6 bg-red-500 dark:bg-red-700 p-2 text-gray-200 hidden lg:flex cursor-pointer whitespace-nowrap transition duration-150 ease-in-out hover:text-gray-300 dark:hover:text-gray-100 focus:text-gray-300 dark:focus:text-gray-100"
        href="#" data-te-ripple-init data-te-ripple-color="light" type="button" id="dropdownMenuButtonQ"
        data-te-dropdown-toggle-ref aria-expanded="false" data-te-nav-link-ref>
        <x-ri-menu-fill class="h-8 w-8" />
    </a>
    <div class="absolute left-0 right-0 top-full z-[1000] mt-0 hidden w-full border-none bg-gray-100 bg-clip-padding shadow-lg dark:bg-gray-900 [&[data-te-dropdown-show]]:block"
        aria-labelledby="dropdownMenuButtonY" data-te-dropdown-menu-ref>
        <div class="px-6 py-5 lg:px-8">
            <div class="grid gap-6 md:grid-cols-4 xl:grid-cols-6">
                @foreach ($categories as $category)
                    <div>
                        <a href="{{ route('products', ['category' => $category->name]) }}"
                            class="block w-full @if (count($category->subCategories)) border-b @endif cursor-pointer border-neutral-200 px-6 py-2 font-semibold uppercase text-gray-800 dark:border-neutral-500 dark:text-white">
                            {{ $category->name }}
                        </a>
                        @if (count($category->subCategories))
                            @foreach ($category->subCategories as $subCategory)
                                <a href="{{ route('products', ['category' => $category->name, 'subCategory' => $subCategory->name]) }}"
                                    aria-current="true"
                                    class="flex gap-4 w-full items-center border-b text-gray-900 dark:text-gray-200 border-neutral-200 px-6 py-3 transition duration-150 ease-in-out hover:bg-gray-50 hover:text-gray-700 dark:border-gray-500 dark:hover:bg-gray-800 dark:hover:text-white">
                                    <div class="shrink-0">
                                        <img src="{{ asset($subCategory->image) }}"
                                            class="w-6 h-6 rounded text-gray-900 dark:text-gray-200"
                                            alt="{{ $subCategory->name }}" />
                                        {{-- <x-icons-camera class="h-7 w-7" /> --}}

                                    </div>
                                    <p>
                                        {{ $subCategory->name }}
                                    </p>
                                </a>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
