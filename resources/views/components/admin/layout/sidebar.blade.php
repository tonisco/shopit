<div class="border-r-4 flex flex-col gap-4 border-brandLighter h-screen shadow-lg w-[250px] overflow-y-hidden py-6">
    <div class="hidden mx-auto sm:block ">
        <x-general.layout.logo />
    </div>

    <nav
        class="flex flex-col h-full gap-6 overflow-y-auto text-sm scrollB scrollbar-thumb-brandLight scrollbar-none text-brandDark bg-brandLighter dark:text-brandLight dark:bg-brandDark">

        <a href="{{ route('admin.dashboard') }}"
            class="relative flex items-center gap-2 px-4 {{ request()->routeIs('admin.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}">
            <x-ri-dashboard-line class="w-4 h-4" />
            <p> Dashboard </p>
            @if (request()->routeIs('admin.dashboard'))
                <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
            @endif
        </a>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-ri-list-check class="w-4 h-4" />
                    <p>Manage Categories</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'"
                class="flex flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>Categories</li>
                <li>Sub Categories</li>
            </ul>
        </div>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-bi-box class="w-4 h-4" />
                    <p>Manage Products</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'" class="flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>Brands</li>
                <li>Products</li>
                <li>Pending Products</li>
                <li>Product Reviews</li>
            </ul>
        </div>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-fas-clipboard-list class="w-4 h-4" />
                    <p>Orders</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'" class="flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>Pending Orders </li>
                <li>All Orders </li>
                <li>Created Orders </li>
                <li>Processing Orders </li>
                <li>Out For Delivery Orders </li>
                <li>Delivered Orders</li>
            </ul>
        </div>

        <a href="{{ route('admin.dashboard') }}"
            class="relative flex items-center gap-2 px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}">
            <x-fas-exchange-alt class="w-4 h-4" />
            <p>Transactions</p>
            @if (request()->routeIs('vendor.dashboard'))
                <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
            @endif
        </a>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-fas-store-alt class="w-4 h-4" />
                    <p>Ecommerce</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'" class="flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>Flash Sale </li>
                <li>Coupons</li>
            </ul>
        </div>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-fas-cog class="w-4 h-4" />
                    <p>Manage Website</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'" class="flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>Slider </li>
                <li>Home Page </li>
                <li>Vendor Condition </li>
                <li>About Page</li>
                <li>Terms Page</li>
            </ul>
        </div>

        <a href="{{ route('admin.dashboard') }}"
            class="relative flex items-center gap-2 px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}">
            <x-ri-advertisement-line class="w-4 h-4" />
            <p>Advertisement</p>
            @if (request()->routeIs('vendor.dashboard'))
                <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
            @endif
        </a>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-fas-user-cog class="w-4 h-4" />
                    <p>Manage Users</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'" class="flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>Customers List </li>
                <li>Vendor List</li>
                <li>Pending Vendors </li>
                <li>Admin List</li>
                <li>Create User</li>
            </ul>
        </div>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-bi-bell class="w-4 h-4" />
                    <p>Activities</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'" class="flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>User Activities</li>
                <li>Vendor Activities</li>
                <li>Admin Activities</li>
            </ul>
        </div>

        <div class="cursor-pointer" x-data="toggler">
            <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                @click="toggle">
                <div class="flex items-center gap-2">
                    <x-fas-wrench class="w-5 h-5" />
                    <p>Settings</p>
                </div>
                <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                    <x-fas-chevron-up class="w-3 h-3 text-brandGrayDark dark:text-brandGray" />
                </div>
                @if (request()->routeIs('vendor.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </div>
            <ul x-cloak :class="open ? 'flex' : 'hidden'" class="flex-col gap-1 py-1 transition-all duration-500 pl-9">
                <li>General Setting</li>
                <li>Change Password</li>
                <li>Payment Settings</li>
            </ul>
        </div>
    </nav>
</div>
