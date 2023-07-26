<nav class="flex flex-col h-full pt-6 text-gray-800 bg-gray-100 dark:text-gray-200 dark:bg-gray-800">
    <a href="{{ route('vendor.dashboard') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-red-500 dark:hover:bg-red-700 active:text-white active:bg-red-500 active:hover:bg-red-700 {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-red-500 dark:bg-red-700' : '' }}">
        <x-ri-dashboard-line class="w-5 h-5" />
        <p> Dashboard </p>
    </a>
    <a
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-red-500 dark:hover:bg-red-700 active:text-white active:bg-red-500 active:hover:bg-red-700">
        <x-ri-clipboard-line class="w-5 h-5" />
        <p> Orders </p>
    </a>
    <a href="{{ route('vendor.product.index') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-red-500 dark:hover:bg-red-700 active:text-white active:bg-red-500 active:hover:bg-red-700">
        <x-ri-shopping-cart-line class="w-5 h-5" />
        <p> Products </p>
    </a>
    <a
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-red-500 dark:hover:bg-red-700 active:text-white active:bg-red-500 active:hover:bg-red-700">
        <x-ri-store-3-line class="w-5 h-5" />
        <p> Shop Profile </p>
    </a>
    <a href="{{ route('dashboard') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-red-500 dark:hover:bg-red-700 active:text-white active:bg-red-500 active:hover:bg-red-700">
        <x-ri-user-line class="w-5 h-5" />
        <p> User Dashboard </p>
    </a>
    <a href="{{ route('home') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-red-500 dark:hover:bg-red-700 active:text-white active:bg-red-500 active:hover:bg-red-700">
        <x-ri-home-5-line class="w-5 h-5" />
        <p> Home Page </p>
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"
            class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-red-500 dark:hover:bg-red-700 active:text-white active:bg-red-500 active:hover:bg-red-700">
            <x-ri-logout-box-line class="w-5 h-5" />
            <p> Log Out </p>
        </a>
    </form>
</nav>
