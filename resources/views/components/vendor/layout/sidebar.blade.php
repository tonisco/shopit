<nav class="h-full bg-red-500 dark:bg-red-700 pt-16 flex flex-col text-white">
    <a href="{{ route('vendor.dashboard') }}"
        class="flex items-center gap-2 border-b border-b-gray-400/70 px-4 py-4 cursor-pointer hover:bg-red-700 dark:hover:bg-red-900 transition-all">
        <x-ri-dashboard-line class="h-5 w-5" />
        <p> Dashboard </p>
    </a>
    <a
        class="flex items-center gap-2 border-b border-b-gray-400/70 px-4 py-4 cursor-pointer hover:bg-red-700 dark:hover:bg-red-900 transition-all">
        <x-ri-clipboard-line class="h-5 w-5" />
        <p> Orders </p>
    </a>
    <a
        class="flex items-center gap-2 border-b border-b-gray-400/70 px-4 py-4 cursor-pointer hover:bg-red-700 dark:hover:bg-red-900 transition-all">
        <x-ri-shopping-cart-line class="h-5 w-5" />
        <p> Products </p>
    </a>
    <a
        class="flex items-center gap-2 border-b border-b-gray-400/70 px-4 py-4 cursor-pointer hover:bg-red-700 dark:hover:bg-red-900 transition-all">
        <x-ri-store-3-line class="h-5 w-5" />
        <p> Shop Profile </p>
    </a>
    <a href="{{ route('dashboard') }}"
        class="flex items-center gap-2 border-b border-b-gray-400/70 px-4 py-4 cursor-pointer hover:bg-red-700 dark:hover:bg-red-900 transition-all">
        <x-ri-user-line class="h-5 w-5" />
        <p> User Dashboard </p>
    </a>
    <a href="{{ route('home') }}"
        class="flex items-center gap-2 border-b border-b-gray-400/70 px-4 py-4 cursor-pointer hover:bg-red-700 dark:hover:bg-red-900 transition-all">
        <x-ri-home-5-line class="h-5 w-5" />
        <p> Home Page </p>
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"
            class="flex items-center gap-2 border-b border-b-gray-400/70 px-4 py-4 cursor-pointer hover:bg-red-700 dark:hover:bg-red-900 transition-all">
            <x-ri-logout-box-line class="h-5 w-5" />
            <p> Log Out </p>
        </a>
    </form>
</nav>
