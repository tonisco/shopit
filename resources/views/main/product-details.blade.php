<x-main.layout.main :page="$product->name">
    <x-main.layout.breadcrumbs heading='{{ $product->name }}' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'product']]" />
    <div class="w-full px-4">
        <div class="w-full p-4 mx-auto my-10 bg-white shadow-lg dark:bg-brandDark max-w-7xl rounded-xl">
            <x-main.layout.product-description :product="$product" />
        </div>
        {{-- TODO: fix tab changes --}}
        <section
            class="flex flex-col w-full gap-10 p-4 mx-auto mb-10 bg-white shadow-lg dark:bg-brandDark max-w-7xl rounded-xl">
            <ul class="flex flex-wrap font-semibold text-brandDark capitalize dark:text-brandLight">
                <li role="presentation">
                    <a data-te-toggle="pill" data-te-target="#tab-description" data-te-nav-active role="tab"
                        class="w-48 py-2 text-center transition-all duration-300 rounded-lg cursor-pointer hover:bg-brandRed/25 dark:hover:bg-brandRedDark/25 hover:text-brandRed dark:hover:text-brandRedDark data-[te-nav-active]:bg-brandRed/25 dark:data-[te-nav-active]:bg-brandRedDark/25 data-[te-nav-active]:text-brandRed dark:data-[te-nav-active]:text-brandRedDark">
                        Description</a>
                </li>
                <li role="presentation">
                    <a data-te-toggle="pill" data-te-target="#tab-vendor" role="tab"
                        class="w-48 py-2 text-center transition-all duration-300 rounded-lg cursor-pointer hover:bg-brandRed/25 dark:hover:bg-brandRedDark/25 hover:text-brandRed dark:hover:text-brandRedDark data-[te-nav-active]:bg-brandRed/25 dark:data-[te-nav-active]:bg-brandRedDark/25 data-[te-nav-active]:text-brandRed dark:data-[te-nav-active]:text-brandRedDark">
                        Vendor</a>
                </li>
                <li role="presentation">
                    <a data-te-toggle="pill" data-te-target="#tab-reviews" role="tab"
                        class="w-48 py-2 text-center transition-all duration-300 rounded-lg cursor-pointer hover:bg-brandRed/25 dark:hover:bg-brandRedDark/25 hover:text-brandRed dark:hover:text-brandRedDark data-[te-nav-active]:bg-brandRed/25 dark:data-[te-nav-active]:bg-brandRedDark/25 data-[te-nav-active]:text-brandRed dark:data-[te-nav-active]:text-brandRedDark">
                        Reviews</a>
                </li>
            </ul>
            <p id="tab-description" role="tabpanel" data-te-tab-active
                class="text-brandDark dark:text-brandLight hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block">
                {{ $product->long_description }}</p>
            <div id="tab-vendor" role="tabpanel">
                <div
                    class="gap-6 hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:flex">
                    <img {{-- src="{{ asset($product->vendor->image) }}" --}} src="{{ asset($product->image) }}" alt="{{ $product->vendor->name }}"
                        class="object-cover rounded-lg h-96 aspect-square" />
                    <div class="flex flex-col gap-4 text-brandDark dark:text-brandLight">
                        <h1 class="text-3xl font-semibold">{{ $product->vendor->name }}</h1>
                        <p>Address: <span
                                class="ml-1 font-semibold text-brandGrayDark dark:text-brandGray">{{ $product->vendor->address }}</span>
                        </p>
                        <p>Phone: <span
                                class="ml-1 font-semibold text-brandGrayDark dark:text-brandGray">{{ $product->vendor->phone }}</span>
                        </p>
                        <p>Mail: <span
                                class="ml-1 font-semibold text-brandGrayDark dark:text-brandGray">{{ $product->vendor->email }}</span>
                        </p>
                        <div class="flex gap-6 mt-2">
                            <a href="https://facebook.com" rel="noreferrer" target="_blank"
                                class="text-brandRed transition dark:text-brandRedDark hover:opacity-75">
                                <x-ri-facebook-circle-fill class="w-6 h-6" />
                            </a>

                            <a href="https://instagram.com" rel="noreferrer" target="_blank"
                                class="text-brandRed transition dark:text-brandRedDark hover:opacity-75">
                                <x-ri-instagram-line class="w-6 h-6" />
                            </a>

                            <a href="https://twitter.com" rel="noreferrer" target="_blank"
                                class="text-brandRed transition dark:text-brandRedDark hover:opacity-75">
                                <x-ri-twitter-fill class="w-6 h-6" />
                            </a>
                        </div>
                        <a class="self-start px-4 py-2 mt-2 text-white capitalize transition-all duration-300 bg-brandRed rounded-full dark:bg-brandRedDark hover:bg-red-600"
                            href="{{ route('vendors-products', $product->vendor->id) }}">Visit
                            store</a>

                    </div>
                </div>
                <p class="mt-6 text-brandDark dark:text-brandLight">{{ $product->vendor->description }}</p>
            </div>
            <div id="tab-reviews" role="tabpanel"
                class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block">
                comment
            </div>

        </section>
    </div>
</x-main.layout.main>
