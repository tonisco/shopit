<x-vendor.layout.main page="Orders">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Orders" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'orders']]" />
        </div>
    </section>
</x-vendor.layout.main>
