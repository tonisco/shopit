<div class="justify-center hidden w-full py-4 bg-brandRed lg:flex dark:bg-brandRedDark">
    <div class="flex items-center justify-between flex-1 gap-4 px-3 text-gray-200 max-w-7xl">
        <a href="{{ route('home') }}" class="cursor-pointer">
            <x-general.layout.logo />
        </a>
        <div class="flex justify-center flex-1 w-auto gap-4">
            <div class="flex-1 max-w-lg px-4 mb-4 lg:mb-0">
                <x-general.input.search />
            </div>
            <div class="flex items-center gap-3">
                <x-ri-customer-service-2-line class="w-8 h-8 text-gray-200" />
                <div class="flex flex-col gap-1 text-sm text-gray-200">
                    <p>{{ $settings->email }}</p>
                    <p>{{ $settings->phone }}</p>
                </div>
            </div>
        </div>
        <div class="flex gap-4">
            <div x-data='toggler' @click="toggle"
                class="cursor-pointer relative text-gray-200 transition duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                <x-ri-shopping-cart-line class="w-6 h-6" />
                <span
                    class="absolute -top-2.5 dark:bg-teal-700 -right-2.5 ml-2.5 rounded-full bg-teal-500 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">1</span>
                <template x-teleport="body">

                    <x-main.layout.sidebar-modal ::show="open" ::toggle="toggle">
                        <x-main.layout.side-cart ::toggle="toggle" />
                    </x-main.layout.sidebar-modal>
                </template>

            </div>


            <a
                class="cursor-pointer relative text-gray-200 transition duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                <x-ri-heart-line class="w-6 h-6" />
                <span
                    class="absolute -top-2.5 -right-2.5 ml-2.5 rounded-full bg-teal-500 dark:bg-teal-700 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">10</span>
            </a>

            <x-general.layout.theme />
        </div>

    </div>
</div>
