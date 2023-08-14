<x-vendor.layout.main page="Products Variants">
    <section class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        <x-vendor.layout.heading title="Create Variant" :crumbs="[
            [
                'name' => 'variant',
                'route' => route('vendor.products.variants.index', $productVariant->product_id),
            ],
            [
                'name' => 'item',
                'route' => route('vendor.products.variants.items.index', [
                    'product' => $productVariant->product->id,
                    'variant' => $productVariant->id,
                ]),
            ],
            ['name' => 'create'],
        ]"
            subtitle="product: <span class='font-medium'>{{ $productVariant->product->name }}</span>" />


        <form method="POST"
            action="{{ route('vendor.products.variants.items.store', ['product' => $productVariant->product->id, 'variant' => $productVariant->id]) }}"
            class="flex flex-col gap-8">
            @csrf
            <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant</h2>

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
                        <input required class="form-input peer" value="{{ old('price') ?? 0 }}" placeholder="Price $"
                            type="number" name="price" id="price">
                        <label class="form-label" for="price">Price $</label>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to the original
                        product price</p>
                    @error('price')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>

                <div class="flex flex-col w-full gap-2">
                    <select required data-te-select-init data-te-select-size="lg" name="isDefault" id="isDefault"
                        value="{{ old('isDefault') }}">
                        <option @if (!old('isDefault') === 'yes') selected @endif value="no">No</option>
                        <option @if (old('isDefault') === 'yes') selected @endif value="yes">Yes</option>
                    </select>
                    <label data-te-select-label-ref for="isDefault">
                        Default
                    </label>
                    @error('isDefault')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
            </div>

            <x-general.input.submit-button text="create" />
            </div>
        </form>
    </section>
</x-vendor.layout.main>
