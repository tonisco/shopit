<nav class="flex flex-col h-full pt-6 text-brandDark bg-brandLighter dark:text-brandLight dark:bg-brandDark">
    <a href="{{ route('vendor.dashboard') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <x-ri-dashboard-line class="w-5 h-5" />
        <p> Dashboard </p>
    </a>
    <a href="{{ route('vendor.orders.index') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.orders.index') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <x-ri-clipboard-line class="w-5 h-5" />
        <p> Orders </p>
    </a>
    <a href="{{ route('vendor.products.index') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.product*') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <x-ri-shopping-cart-line class="w-5 h-5" />
        <p> Products </p>
    </a>
    <a href="{{ route('vendor.profile.index') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.profile.index') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <x-ri-store-3-line class="w-5 h-5" />
        <p> Profile </p>
    </a>
    <a href="{{ route('dashboard') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark">
        <x-ri-user-line class="w-5 h-5" />
        <p> User Dashboard </p>
    </a>
    <a href="{{ route('home') }}"
        class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark">
        <x-ri-home-5-line class="w-5 h-5" />
        <p> Home Page </p>
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"
            class="flex items-center gap-2 px-6 py-4 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark">
            <x-ri-logout-box-line class="w-5 h-5" />
            <p> Log Out </p>
        </a>
    </form>
</nav>
