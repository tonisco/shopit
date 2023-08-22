<x-vendor.layout.main page="Products edit">
    <section class="flex flex-col flex-1 gap-8 px-6 py-8 overflow-x-hidden">
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between sm:items-center">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize dark:text-gray-200">Edit Product</h1>

            <form action="{{ route('vendor.products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-general.input.submit-button text="Delete" />
            </form>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('vendor.products.update', $product->id) }}">
            @csrf
            @method('PUT')
            <div class="flex flex-col flex-wrap gap-8 mb-6 sm:gap-4 sm:flex-row">
                <div class="flex flex-[3] flex-col gap-8 sm:min-w-[31rem]">

                    @include('vendor.Products.partials.basic-information-form')

                    @include('vendor.Products.partials.image-form')

                    @include('vendor.Products.partials.pricing-form')


                    @include('vendor.Products.partials.inventory-form')
                </div>

                <div class="flex flex-[2] flex-col gap-8 sm:min-w-[20.625rem]" x-data="categoriesData({{ json_encode($categories) }}, {{ $product->category_id }})">

                    @include('vendor.Products.partials.group-form')

                    @include('vendor.Products.partials.published-form')

                    @include('vendor.Products.partials.seo-form')
                </div>
            </div>
            <x-general.input.submit-button text="update" />
        </form>
    </section>
</x-vendor.layout.main>
