<div class="w-full hidden lg:flex justify-center bg-red-500 py-4 dark:bg-red-700">
    <div class="max-w-7xl flex-1 items-center justify-between flex gap-4 px-3 text-gray-200">
        <x-layout.logo />
        <div class="flex w-auto flex-1 gap-4 justify-center">
            <div class=" flex-1 max-w-lg px-4 mb-4 lg:mb-0">
                <x-input.search />
            </div>
            <div class="flex gap-3 items-center">
                <x-ri-customer-service-2-line class="h-8 w-8 text-gray-200" />
                <div class="text-sm flex flex-col gap-1 text-gray-200">
                    <p>Customer@shopit.com</p>
                    <p>+01-342848320</p>
                </div>
            </div>
        </div>
        <div class="flex gap-4">
            <a
                class="cursor-pointer relative text-gray-200 transition duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                <x-ri-shopping-cart-line class="h-6 w-6" />
                <span
                    class="absolute -top-2.5 dark:bg-teal-700 -right-2.5 ml-2.5 rounded-full bg-teal-500 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">1</span>
            </a>


            <a
                class="cursor-pointer relative text-gray-200 transition duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                <x-ri-heart-line class="h-6 w-6" />
                <span
                    class="absolute -top-2.5 -right-2.5 ml-2.5 rounded-full bg-teal-500 dark:bg-teal-700 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">10</span>
            </a>

            <x-layout.theme />
        </div>
    </div>
</div>
