<x-vendor.layout.main page="Products edit">
    <section class="flex flex-col flex-1 gap-8 px-6 py-8 overflow-x-hidden">
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize dark:text-gray-200">Edit Product</h1>

            <form action="{{ route('vendor.products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-general.input.submit-button text="Delete Product" />
            </form>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('vendor.products.update', $product->id) }}">
            <div class="flex flex-col flex-wrap gap-8 sm:gap-4 sm:flex-row">
                <div class="flex flex-[3] flex-col gap-8 sm:min-w-[31rem]">

                    <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Basic Information
                        </h2>

                        <div class="flex flex-col w-full gap-2">
                            <div class="relative" data-te-input-wrapper-init>
                                <input required type="text"name="name" id="name" placeholder="Name"
                                    class="form-input peer" value="{{ $product->name }}">
                                <label for="name" class="form-label">Name</label>
                            </div>
                            @error('name')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="flex flex-col w-full gap-2">
                            <div class="relative" data-te-input-wrapper-init>
                                <input required class="form-input peer" value="{{ $product->short_description }}"
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
                                <textarea class="form-input peer" value="{{ $product->long_description }}"name="long_description" id="long_description"
                                    cols="30" rows="10">{{ $product->long_description }}</textarea>
                                <label class="form-label" for="long_description">Long
                                    Description</label>
                            </div>
                            @error('long_description')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md w2 dark:bg-gray-800">
                        <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Pricing</h2>

                        <div class="flex flex-col w-full gap-2">
                            <div class="relative" data-te-input-wrapper-init>
                                <input required class="form-input peer" value="{{ $product->price }}"
                                    placeholder="Price $" type="number" name="price" id="price">
                                <label class="form-label" for="price">Price $</label>
                            </div>
                            @error('price')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="flex flex-col w-full gap-2">
                            <div class="relative" data-te-input-wrapper-init>
                                <input class="form-input peer" value="{{ $product->discount }}" type="number"
                                    name="discount" id="discount">
                                <label class="form-label" for="discount">Discount %</label>
                            </div>
                            @error('discount')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="flex flex-col w-full gap-2">
                            <x-utils.date-picker show-time :time24hr="false" min-date="today"
                                label="Discount Date Range" clearable range name="discount_date"
                                value="{{ $product->discount_start_date . ' to ' . $product->discount_end_date }}" />
                            @error('discount_date')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Inventory</h2>

                        <div class="flex flex-col w-full gap-2">
                            <div class="relative" data-te-input-wrapper-init>
                                <input required class="form-input peer" value="{{ $product->qty }}" type="number"
                                    name="qty" id="qty">
                                <label class="form-label" for="qty">Stock Quantity</label>
                            </div>
                            @error('qty')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex flex-[2] flex-col gap-8 sm:min-w-[20.625rem]" x-data="categoriesData({{ json_encode($categories) }}, {{ $product->category_id }})">
                    <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Group</h2>

                        <div class="flex flex-col w-full gap-2">
                            <div class="flex-1">
                                <select required data-te-select-init data-te-select-size="lg" name="category"
                                    id="category" x-on:change="setSubCategory($event.target.value)"
                                    value="{{ $product->category_id }}">
                                    <option>Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $product->category_id) selected @endif>{{ $category->name }}
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
                                            :selected="subCategory.id == {{ $product->sub_category_id }}"
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
                            <select required data-te-select-init data-te-select-size="lg" name="brand"
                                id="brand" value="{{ $product->brand }}">
                                <option>Select</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        @if ($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
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
                            <select required data-te-select-init data-te-select-size="lg" name="status"
                                id="status" value="{{ $product->status }}">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
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
                                bring your product to the top of search engines.</p>
                        </div>

                        <div class="flex flex-col w-full gap-2">
                            <div class="relative" data-te-input-wrapper-init>
                                <input class="form-input peer" value="{{ $product->seo_title }}" type="number"
                                    name="seo_title" id="seo_title">
                                <label class="form-label" for="seo_title">Seo Title</label>
                            </div>
                            @error('seo_title')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="flex flex-col w-full gap-2">
                            <div class="relative" data-te-input-wrapper-init>
                                <input class="form-input peer" value="{{ $product->seo_description }}"
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
            </div>
        </form>

        <form method="POST" enctype="multipart/form-data"
            action="{{ route('vendor.products.update', $product->id) }}"
            class="flex flex-col gap-8 p-8 bg-white shadow-lg rounded-2xl dark:bg-gray-800">
            @csrf
            <div>
                <h3>Product Image</h3>
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="object-cover h-56 w-52">

            </div>

            <div class="flex flex-col w-full gap-2">
                <div class="flex flex-col gap-1">
                    <label class="text-lg text-gray-800 dark:text-gray-200" for="image">Image</label>
                    <input required accept="image/*"
                        class="relative focus:ring-red-500 dark:focus:ring-red-700 focus:border-red-500 dark:focus:border-red-700 m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:text-neutral-700 focus:shadow-te-danger focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
                        type="file" name="image" id="image">
                </div>
                @error('discount')
                    <x-general.input.input-error :messages="$message" />
                @enderror
            </div>

            <x-general.input.submit-button text="update Product" />
        </form>
    </section>
</x-vendor.layout.main>
