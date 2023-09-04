<x-vendor.layout.main page="Products create">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="{{ $product->name . ' Reviews' }}" :crumbs="[
                ['name' => 'dashboard', 'route' => route('vendor.dashboard')],
                ['name' => 'products', 'route' => route('vendor.products.index')],
                ['name' => 'reviews'],
            ]" />
        </div>
        <div class="flex flex-col gap-4">

            @foreach ($reviews as $review)
                <div class="flex flex-col gap-2 p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800 sm:max-w-[90%]">
                    <div class="flex items-center gap-4">
                        <x-ri-user-3-fill class="w-12 h-12 text-gray-500" />
                        <div>
                            <h3 class="text-gray-800 dark:text-gray-200">
                                {{ $review->user->first_name . ' ' . $review->user->last_name }}</h3>
                            <p class="text-xs font-medium text-gray-500">{{ $review->updated_at->format('d-m-y h:ma') }}
                            </p>
                        </div>
                    </div>
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $review->review }}</p>
                </div>
            @endforeach
        </div>

        {{-- TODO: all pagination restyle  --}}
        {{ $reviews->links() }}
    </section>
</x-vendor.layout.main>
