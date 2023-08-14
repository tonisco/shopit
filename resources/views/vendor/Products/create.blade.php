<x-vendor.layout.main page="Products create">
    <form method="POST" action="{{ route('vendor.products.store') }}" enctype="multipart/form-data"
        class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        @csrf
        <div class="flex flex-col justify-between w-full gap-4 sm:items-center sm:flex-row">
            <x-vendor.layout.heading title="Create Product" :crumbs="[
                ['name' => 'dashboard', 'route' => route('vendor.dashboard')],
                ['name' => 'products', 'route' => route('vendor.products.index')],
                ['name' => 'create product'],
            ]" />
            <x-general.input.submit-button text="create" />
        </div>

        <div class="flex flex-col flex-wrap gap-8 sm:gap-4 sm:flex-row">
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
                            <textarea class="form-input peer" required name="short_description" id="short_description" cols="30"
                                rows="5">{{ old('short_description') }}</textarea>
                            <label class="form-label" for="short_description">Short
                                Description</label>
                        </div>
                        @error('short_description')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="relative flex flex-col w-full gap-2">
                        <div class="w-full overflow-hidden rounded editor" x-data="editor('long_description', '{{ old('long_description') }}')">
                            <textarea class="hidden" name="long_description" id="long_description" cols="30" rows="10"></textarea>
                            <div id="editor" x-ref='editor'></div>
                            <label
                                class="text-[13px] bg-white des transition-all duration-200 dark:bg-gray-800 p-1.5 text-gray-500 dark:text-gray-200 absolute -top-4 left-3 max-w-[90%]">Long
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
                            @error('image')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

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

                    {{-- TODO: fix date range for mobile screens --}}
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

            </div>



            <div class="flex flex-[2] flex-col gap-8 sm:min-w-[20.625rem]" x-data="categoriesData({{ json_encode($categories) }}, {{ old('category') }})">
                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Group</h2>

                    <div class="flex flex-col w-full gap-2">
                        <div class="flex-1">
                            <select required data-te-select-init data-te-select-size="lg" name="category" id="category"
                                x-on:change="setSubCategory($event.target.value)">
                                <option>Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == old('category')) selected @endif>{{ $category->name }}
                                    </option>
                                @endforeach
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
                                    <option :value="subCategory.id"
                                        :selected="subCategory.id == {{ old('sub_category') }}"
                                        x-text="subCategory.name"></option>
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
                        <select required data-te-select-init data-te-select-size="lg" name="brand" id="brand"
                            value="{{ old('brand') }}">
                            <option>Select</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if ($brand->id == old('brand')) selected @endif>
                                    {{ $brand->name }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <label data-te-select-label-ref for="brand">Brand</label>
                        @error('brand')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                </div>

                <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Published</h2>
                    <div class="flex flex-col w-full gap-2">
                        <select required data-te-select-init data-te-select-size="lg" name="status" id="status">
                            <option @if (old('status') === 'active') selected @endif value="active">Active</option>
                            <option @if (!old('status') === 'active') selected @endif value="inactive">Inactive
                            </option>
                        </select>
                        <label data-te-select-label-ref for="status">
                            status
                        </label>
                        @error('status')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
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
                            <input class="form-input peer" value="{{ old('seo_title') }}" type="number"
                                name="seo_title" id="seo_title">
                            <label class="form-label" for="seo_title">Seo Title</label>
                        </div>
                        @error('seo_title')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex flex-col w-full gap-2">
                        <div class="relative" data-te-input-wrapper-init>
                            <input class="form-input peer" value="{{ old('seo_description') }}" type="text"
                                name="seo_description" id="seo_description">
                            <label class="form-label" for="seo_description">Seo
                                Description</label>
                        </div>
                        @error('seo_description')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </form>
</x-vendor.layout.main>
