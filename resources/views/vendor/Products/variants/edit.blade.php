<x-vendor.layout.main page="Products Variants">
    <section class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        <x-vendor.layout.heading title="Edit Variant" :crumbs="[
            ['name' => 'products', 'route' => route('vendor.products.index')],
            ['name' => 'variant', 'route' => route('vendor.products.variants.index', $productId)],
            ['name' => 'edit'],
        ]" />

        <form method="POST"
            action="{{ route('vendor.products.variants.update', ['product' => $productId, 'variant' => $productVariant->id]) }}"
            class="flex flex-col gap-8">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant</h2>

                <div class="flex flex-col w-full gap-2">
                    <div class="relative" data-te-input-wrapper-init>
                        <input required type="text"name="name" id="name" placeholder="Name"
                            class="form-input peer" value="{{ $productVariant->name }}">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    @error('name')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>

                <div class="flex flex-col w-full gap-2">
                    <select required data-te-select-init data-te-select-size="lg" name="status" id="status">
                        <option @if ($productVariant->status) selected @endif value="active">Active</option>
                        <option @if (!$productVariant->status) selected @endif value="inactive">Inactive</option>
                    </select>
                    <label data-te-select-label-ref for="status">
                        status
                    </label>
                    @error('status')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
            </div>

            <x-general.input.submit-button text="save" />
            </div>
    </section>
</x-vendor.layout.main>
