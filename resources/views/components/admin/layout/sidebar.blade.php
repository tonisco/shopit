<nav
    class="flex flex-col w-64 h-full gap-4 py-6 shadow-lg text-brandDark bg-brandLighter dark:text-brandLight dark:bg-brandDark">
    <a href="{{ route('vendor.dashboard') }}"
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('admin.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <x-ri-dashboard-line class="w-5 h-5" />
        <p> Dashboard </p>
    </a>
    <div class="px-4 cursor-pointer" x-data="toggler">
        <div class="flex items-center justify-between w-full" @click="toggle">
            <div class="flex items-center gap-2">
                <x-fas-list class="w-3 h-3" />
                <p>Manage Categories</p>
            </div>
            <div :class="open ? 'rotate-90' : ''" class="transition-all duration-300">
                <x-fas-chevron-right class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
            </div>
        </div>
        <ul x-cloak :class="open ? 'max-h-full' : 'max-h-0 hidden'"
            class="flex flex-col gap-1 py-2 pl-5 overflow-y-hidden transition-all duration-500 origin-top">
            <li>Categories</li>
            <li>Sub Categories</li>
        </ul>
    </div>
    <div
        class="items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>ManageProducts</p>
        <ul>
            <li>Brands</li>
            <li>Products</li>
            <li>Pending Products</li>
            <li>Product Reviews</li>
        </ul>
    </div>
    <div
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>Orders</p>
        <ul>
            <li>Pending Orders </li>
            <li>All Orders </li>
            <li>Created Orders </li>
            <li>Processing Orders </li>
            <li>Out For Delivery Orders </li>
            <li>Delivered Orders</li>
        </ul>
    </div>
    <div
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>Transactions</p>
    </div>
    <div
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>Ecommerce</p>
        <ul>
            <li>Flash Sale </li>
            <li>Coupons</li>
        </ul>
    </div>
    <div
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>Manage Website</p>
        <ul>
            <li>Slider </li>
            <li>Home Page </li>
            <li>Vendor Condition </li>
            <li>About Page</li>
            <li>Terms Page</li>
        </ul>
    </div>

    <div
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>Advertisement</p>
    </div>
    <div
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>Manage Users</p>
        <ul>
            <li>Customers List </li>
            <li>Vendor List</li>
            <li>Pending Vendors </li>
            <li>Admin List</li>
            <li>Create User</li>
        </ul>
    </div>
    <p
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        Activities</p>
    <div
        class="flex items-center gap-2 px-6 py-2 transition-all cursor-pointer hover:text-white hover:bg-brandRed dark:hover:bg-brandRedDark active:text-white active:bg-brandRed active:hover:bg-brandRedDark {{ request()->routeIs('vendor.dashboard') ? 'text-white bg-brandRed dark:bg-brandRedDark' : '' }}">
        <p>Settings</p>
        <ul>
            <li>General Setting</li>
            <li>Change Password</li>
            <li>Payment Settings</li>
        </ul>
    </div>
</nav>
