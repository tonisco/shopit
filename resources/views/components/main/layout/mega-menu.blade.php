@php
    $categories = \App\Models\Category::with([
        'subCategories' => function ($query) {
            $query->where('status', 1);
        },
    ])
        ->where('status', true)
        ->get();
@endphp
{{-- TODO: fix icon on each menu  --}}
<div class="static" data-te-nav-item-ref data-te-dropdown-ref>
    <a class="items-center hidden p-2 mr-6 text-brandLight transition duration-150 ease-in-out bg-brandRed cursor-pointer dark:bg-brandRedDark lg:flex whitespace-nowrap hover:text-brandLight dark:hover:text-brandLighter focus:text-brandLight dark:focus:text-brandLighter"
        href="#" data-te-ripple-init data-te-ripple-color="light" type="button" id="dropdownMenuButtonQ"
        data-te-dropdown-toggle-ref aria-expanded="false" data-te-nav-link-ref>
        <x-ri-menu-fill class="w-8 h-8" />
    </a>
    <div class="absolute left-0 right-0 top-full z-[1000] mt-0 hidden w-full border-none bg-brandLighter bg-clip-padding shadow-lg dark:bg-brandDarker [&[data-te-dropdown-show]]:block"
        aria-labelledby="dropdownMenuButtonY" data-te-dropdown-menu-ref>
        <div class="px-6 py-5 lg:px-8">
            <div class="grid gap-6 md:grid-cols-4 xl:grid-cols-6">
                @foreach ($categories as $category)
                    <div>
                        <a href="{{ route('products', ['category' => $category->name]) }}"
                            class="block w-full @if (count($category->subCategories)) border-b @endif cursor-pointer border-neutral-200 px-6 py-2 font-semibold uppercase text-brandDark dark:border-neutral-500 dark:text-white">
                            {{ $category->name }}
                        </a>
                        @if (count($category->subCategories))
                            @foreach ($category->subCategories as $subCategory)
                                <a href="{{ route('products', ['category' => $category->name, 'subCategory' => $subCategory->name]) }}"
                                    aria-current="true"
                                    class="flex items-center w-full gap-4 px-6 py-3 text-brandDarker transition duration-150 ease-in-out border-b dark:text-brandLight border-neutral-200 hover:bg-gray-50 hover:text-brandDark dark:border-brandGrayDark dark:hover:bg-brandDark dark:hover:text-white">
                                    <div class="shrink-0">
                                        <img src="{{ asset($subCategory->image) }}"
                                            class="w-6 h-6 text-brandDarker rounded dark:text-brandLight"
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
