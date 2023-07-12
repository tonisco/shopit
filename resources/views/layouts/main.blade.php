<x-layout.topnav />
<nav class="flex-no-wrap relative flex w-full items-center justify-between bg-red-500 dark:bg-red-700 lg:bg-white py-2 lg:py-1 shadow-md shadow-black/5 lg:dark:bg-gray-800 dark:shadow-black/10 lg:flex-wrap lg:justify-start"
    data-te-navbar-ref>
    <div class="flex flex-1 container flex-wrap items-center justify-between px-3 py-2 lg:py-0 lg:mx-auto max-w-7xl">
        <button
            class="block border-0 bg-transparent px-2 text-gray-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-gray-200 lg:hidden"
            type="button" data-te-collapse-init data-te-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <x-ri-menu-2-fill class="h-7 w-7 text-gray-200" />
        </button>

        <a href="{{ route('home') }}" class="lg:hidden cursor-pointer text-gray-200">
            <x-layout.logo />
        </a>

        <div class="!visible hidden flex-grow basis-[100%] items-center gap-2 lg:!flex lg:basis-auto"
            id="navbarSupportedContent1" data-te-collapse-item>

            <div class="mr-6 bg-red-500 dark:bg-red-700 p-2 text-white hidden lg:block cursor-pointer">
                <x-ri-menu-fill class="h-8 w-8" />
            </div>

            <x-layout.navlinks />
        </div>

        <div class="relative gap-4 flex items-center">
            <a
                class="cursor-pointer relative lg:hidden text-gray-900 transition duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:text-gray-200 dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                <x-ri-shopping-cart-line class="h-6 w-6 text-gray-200" />
                <span
                    class="absolute -top-2.5 -right-2.5 ml-2.5 rounded-full bg-teal-500 dark:bg-teal-700 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">1</span>
            </a>

            <a
                class="cursor-pointer relative lg:hidden text-gray-900 transition duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:text-gray-200 dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                <x-ri-heart-line class="h-6 w-6 text-gray-200" />
                <span
                    class="absolute -top-2.5 -right-2.5 ml-2.5 rounded-full bg-teal-500 dark:bg-teal-700 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">1</span>
            </a>

            <div class="lg:hidden">
                <x-layout.theme />
            </div>

            <a
                class="cursor-pointer text-gray-900 hidden lg:inline-block transition duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:text-gray-200 dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                Track Order
            </a>

            <a
                class="cursor-pointer text-gray-900 transition hidden lg:inline-block duration-200 hover:text-gray-700 hover:ease-in-out focus:text-gray-700 disabled:text-black/30 motion-reduce:transition-none dark:text-gray-200 dark:hover:text-gray-300 dark:focus:text-gray-300 [&.active]:text-black/90 dark:[&.active]:text-gray-400">
                Login
            </a>
        </div>
    </div>
</nav>
