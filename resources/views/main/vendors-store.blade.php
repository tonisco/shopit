<x-main.layout.main :page="$vendor->name">
    <x-main.layout.breadcrumbs heading='{{ $vendor->name }}' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'Vendor Store']]" />
    <div class="w-full px-4 my-10">
        <div class="w-full mx-auto max-w-7xl">
            {{-- TODO: redesign this --}}
            <div class="flex flex-col justify-center w-full gap-2 p-4 my-10 text-white h-80"
                style="background-image:linear-gradient(0deg,rgba(0,0,0,0.65), rgba(0,0,0,.65)),url({{ asset($vendor->image) }});">
                <h3 class="text-3xl capitalize">{{ $vendor->name }}</h3>
                <p class="flex items-center gap-2">
                    <x-ri-mail-line class="w-5 h-5 text-white" /><span>{{ $vendor->email }}</span>
                </p>
                <p class="flex items-center gap-2">
                    <x-ri-map-pin-line class="w-5 h-5 text-white" />
                    <span>{{ $vendor->address }}</span>
                </p>
                <p class="flex items-center gap-2">
                    <x-ri-phone-fill class="w-5 h-5 text-white" /><span>{{ $vendor->phone }}</span>
                </p>
                <div class="flex gap-2 mt-2">
                    @if ($vendor->fb_link)
                        <a href="{{ $vendor->fb_link }}" rel="noreferrer" target="_blank"
                            class="p-2 text-gray-700 transition bg-white rounded-full hover:text-white hover:bg-sky-500">
                            <x-ri-facebook-fill class="w-4 h-4" />
                        </a>
                    @endif

                    @if ($vendor->insta_link)
                        <a href="{{ $vendor->insta_link }}" rel="noreferrer" target="_blank"
                            class="p-2 text-gray-700 transition bg-white rounded-full hover:text-white hover:bg-red-500">
                            <x-ri-instagram-line class="w-4 h-4" />
                        </a>
                    @endif

                    @if ($vendor->tw_link)
                        <a href="{{ $vendor->tw_link }}" rel="noreferrer" target="_blank"
                            class="p-2 text-gray-700 transition bg-white rounded-full hover:text-white hover:bg-blue-500">
                            <x-ri-twitter-fill class="w-4 h-4" />
                        </a>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 mx-auto sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                    <x-main.layout.product-card :product="$product" />
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
</x-main.layout.main>
