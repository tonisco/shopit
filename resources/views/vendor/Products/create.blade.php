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

                @include('vendor.Products.partials.basic-information-form')

                @include('vendor.Products.partials.image-form')

                @include('vendor.Products.partials.pricing-form')

                @include('vendor.Products.partials.inventory-form')

            </div>



            <div class="flex flex-[2] flex-col gap-8 sm:min-w-[20.625rem]" x-data="categoriesData({{ json_encode($categories) }}, {{ old('category') }})">

                @include('vendor.Products.partials.group-form')

                @include('vendor.Products.partials.published-form')

                @include('vendor.Products.partials.seo-form')
            </div>

        </div>
    </form>
</x-vendor.layout.main>
