<div id="{{ $id }}">
    @foreach ($categories as $category)
        @php
            $isCategory = request()->get('category') === $category->name;
        @endphp
        <div class="py-2 rounded-t-lg">
            <h2 class="mb-1" id="{{ $category->id }}">
                @php
                    if ($isCategory) {
                        $text_color = 'text-brandRed dark:text-brandRedDark';
                    } else {
                        $text_color = 'text-brandDark dark:text-white';
                    }
                @endphp

                <button
                    class="group relative flex w-full items-center rounded-t-[15px] text-left text-sm {{ $text_color }}  transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none  [&:not([data-te-collapse-collapsed])]:text-brandRed dark:[&:not([data-te-collapse-collapsed])]:text-brandRedDark"
                    type="button" data-te-collapse-init
                    @if (!$isCategory) data-te-collapse-collapsed @endif
                    data-te-target="#{{ Str::slug($category->name) }}">
                    <a class="capitalize"
                        href="{{ request()->fullUrlWithQuery(['category' => $category->name, 'subCategory' => null, 'page' => null]) }}">
                        {{ $category->name }}</a>
                    @if (count($category->subCategories))
                        <x-ri-arrow-up-s-line
                            class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] text-brandRed transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:text-brandDark motion-reduce:transition-none dark:text-brandRedDark dark:group-[[data-te-collapse-collapsed]]:text-brandLight" />
                    @endif
                </button>
            </h2>
            <div id="{{ Str::slug($category->name) }}"
                class="!visible @if (!$isCategory) hidden @endif px-2"
                @if ($isCategory) data-te-collapse-show @endif data-te-collapse-item
                data-te-parent="#{{ $id }}">
                @if (count($category->subCategories))
                    <div class='flex flex-col gap-1 text-sm'>
                        @foreach ($category->subCategories as $subCategory)
                            @php
                                $isSubCategory = request()->get('subCategory') === $subCategory->name;
                                if ($isSubCategory) {
                                    $text_color = 'text-brandRed dark:text-brandRedDark';
                                } else {
                                    $text_color = 'text-brandDark dark:text-brandLight';
                                }
                            @endphp
                            <a href="{{ request()->fullUrlWithQuery(['category' => $category->name, 'subCategory' => $subCategory->name, 'page' => null]) }}"
                                class="capitalize {{ $text_color }}">{{ $subCategory->name }}</a>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>
    @endforeach

</div>
