<x-vendor.layout.main page="Products create">
    <section class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        <div class="flex flex-col justify-between w-full gap-4 sm:items-center sm:flex-row">
            <x-vendor.layout.heading title="Create Product" :crumbs="[
                ['name' => 'dashboard', 'route' => route('vendor.dashboard')],
                ['name' => 'products', 'route' => route('vendor.products.index')],
                ['name' => 'create product'],
            ]" />
            <x-general.input.submit-button text="create Product" />
        </div>

        <form method="POST" enctype="multipart/form-data" class="flex flex-col flex-wrap gap-8 sm:gap-4 sm:flex-row"
            action="{{ route('vendor.products.store') }}">
            @csrf
            <div class="flex flex-[3] flex-col gap-8 sm:min-w-[31rem]">

                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Basic Information</h2>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input required type="text"name="name" id="name" placeholder="Name"
                                class="form-input peer" value="{{ old('name') }}">
                            <label for="name" class="form-label">Name</label>
                        </div>
                        @error('name')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input required class="form-input peer" value="{{ old('short_description') }}"
                                type="text" name="short_description" id="short_description">
                            <label class="form-label" for="short_description">Short
                                Description</label>
                        </div>
                        @error('short_description')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <textarea class="form-input peer" value="{{ old('long_description') }}"name="long_description" id="long_description"
                                cols="30" rows="10"></textarea>
                            <label class="form-label" for="long_description">Long
                                Description</label>
                        </div>
                        @error('long_description')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">
                        Images</h2>

                    <div
                        class="grid gap-4 grid-cols-[repeat(auto-fit,minmax(80px,1fr))] sm:grid-cols-[repeat(auto-fit,minmax(128px,1fr))] sm:auto-rows-[144px] auto-rows-[96px] grid-rows-[repeat(auto-fill,96px)] sm:grid-rows-[repeat(auto-fill,144px)]">

                        <div class="col-span-2 row-span-2">
                            <x-general.input.image-input name="image" id="image" />
                        </div>
                        @error('image')
                            <x-general.input.input-error :messages="$message" />
                        @enderror

                        @for ($i = 1; $i < 7; $i++)
                            <x-general.input.image-input name="product_image{{ $i }}"
                                id="product_image{{ $i }}" />
                        @endfor

                    </div>
                </div>


                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md w2 dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Pricing</h2>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input required class="form-input peer" value="{{ old('price') }}" placeholder="Price $"
                                type="number" name="price" id="price">
                            <label class="form-label" for="price">Price $</label>
                        </div>
                        @error('price')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input class="form-input peer" value="{{ old('discount') }}" type="number" name="discount"
                                id="discount">
                            <label class="form-label" for="discount">Discount %</label>
                        </div>
                        @error('discount')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <x-utils.date-picker show-time :time24hr="false" min-date="today" label="Discount Date Range"
                            clearable range name="discount_date" />
                        @error('discount_date')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Inventory</h2>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input required class="form-input peer" value="{{ old('qty') }}" type="number"
                                name="qty" id="qty">
                            <label class="form-label" for="qty">Stock Quantity</label>
                        </div>
                        @error('qty')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variants</h2>
                </div>
            </div>



            <div class="flex flex-[2] flex-col gap-8 sm:min-w-[20.625rem]" x-data="categoriesData({{ json_encode($categories) }})">
                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Group</h2>

                    <div class="flex flex-col w-full gap-2">
                        <div class="flex-1">
                            <select required data-te-select-init data-te-select-size="lg" name="category" id="category"
                                x-on:change="setSubCategory($event.target.value)">
                                <option>Select</option>
                                <template x-for="category in categories">
                                    <option :value="category.id" x-text="category.name"></option>
                                </template>
                            </select>
                            <label data-te-select-label-ref for="category">Category</label>
                        </div>
                        @error('category')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <div class="flex-1">
                            <select required data-te-select-init data-te-select-size="lg" name="sub_category"
                                id="sub_category">
                                <option>Select</option>
                                <template x-for="subCategory in subCategories">
                                    <option :value="subCategory.id" x-text="subCategory.name"></option>
                                </template>
                            </select>
                            <label data-te-select-label-ref for="sub_category">Sub
                                Category</label>
                        </div>
                        @error('sub_category')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <select required data-te-select-init data-te-select-size="lg" name="brand" id="brand">
                            <option>Select</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <label data-te-select-label-ref for="brand">Brand</label>
                        @error('brand')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                </div>

                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Status</h2>
                    <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                        <input
                            class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:hover:!bg-red-600 focus:ring-0 checked:border-red-500 checked:bg-red-500 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-red-500 dark:checked:bg-red-500 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                            type="checkbox" name="status" id="status" checked />
                        <label class="inline-block pl-[0.15rem] hover:cursor-pointer dark:text-gray-200"
                            for="status">
                            Published
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div>
                        <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Search engine
                            optimization
                        </h2>
                        <p class="text-sm text-gray-500">Provide information that will help improve the snippet and
                            bring
                            your product to the top of
                            search engines.</p>
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input required class="form-input peer" value="{{ old('seo_title') }}" type="number"
                                name="seo_title" id="seo_title">
                            <label class="form-label" for="seo_title">Seo Title</label>
                        </div>
                        @error('seo_title')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input required class="form-input peer" value="{{ old('seo_description') }}"
                                type="text" name="seo_description" id="seo_description">
                            <label class="form-label" for="seo_description">Seo
                                Description</label>
                        </div>
                        @error('seo_description')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                </div>
            </div>

        </form>
    </section>
</x-vendor.layout.main>
