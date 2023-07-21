@php
    $products = App\Models\Product::paginate(3);
@endphp
<div class="relative px-2 py-4 overflow-y-auto bg-white dark:bg-gray-800 w-80 sm:px-6 lg:px-8">
    {{-- TODO: fix close icon --}}
    <button class="absolute text-gray-600 transition dark:text-gray-300 end-4 top-4 hover:scale-110">
        <x-ri-close-fill class="w-5 h-5" />
    </button>

    <div class="mt-10 space-y-6">
        <ul class="space-y-4">
            @foreach ($products as $product)
                <li class="flex items-center gap-4">
                    <img src="{{ $product->image }}" alt="" class="object-cover w-16 h-16 rounded" />
                    <div>
                        <h3 class="text-sm text-gray-800 dark:text-gray-200">{{ $product->name }}</h3>

                        <dl class="my-0.5 space-y-px text-[10px] text-gray-600 dark:text-gray-400">
                            <div>
                                <dt class="inline">Size:</dt>
                                <dd class="inline">XXS</dd>
                            </div>

                            <div>
                                <dt class="inline">Color:</dt>
                                <dd class="inline">White</dd>
                            </div>
                            <div>
                                <dt class="inline">Qty:</dt>
                                <dd class="inline">1</dd>
                            </div>
                        </dl>
                        <h3 class="text-xs text-gray-800 dark:text-gray-200">${{ $product->price }}</h3>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="flex justify-between w-full text-center">
            <a href="#"
                class="block px-3 py-2 text-sm text-red-500 capitalize transition border border-red-500 rounded-lg dark:text-red-600 dark:border-red-600 hover:ring-1 hover:ring-red-500 dark:hover:ring-red-600">
                View cart (3)
            </a>

            <a href="#"
                class="block px-3 py-2 text-sm text-white capitalize transition bg-red-500 rounded-lg dark:bg-red-700 hover:bg-red-600">
                Checkout
            </a>
        </div>
    </div>
</div>
