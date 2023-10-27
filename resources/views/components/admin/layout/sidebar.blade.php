<div
    class="flex flex-col gap-4 h-screen shadow-lg w-[250px] overflow-y-hidden py-6 text-brandDark bg-brandLighter dark:text-brandLight dark:bg-brandDark">
    <div class="hidden mx-auto sm:block ">
        <x-general.layout.logo />
    </div>

    <nav
        class="flex flex-col h-full gap-10 py-2 overflow-y-auto text-sm border-r-4 bar scrollbar-thin scrollBar-hide border-brandLighter scrollbar-thumb-brandLight dark:border-brandDark">

        <div class="flex flex-col gap-6">
            <h2 class="ml-2 text-xs text-brandGray dark:text-brandGrayDark">DASHBOARD</h2>

            <a href="{{ route('admin.dashboard') }}"
                class="relative flex items-center gap-2 px-4 {{ request()->routeIs('admin.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}">
                <x-ri-dashboard-line class="w-4 h-4" />
                <p> Dashboard </p>
                @if (request()->routeIs('admin.dashboard'))
                    <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark"></div>
                @endif
            </a>
        </div>

        <div class="flex flex-col gap-6">
            <h2 class="ml-2 text-xs text-brandGray dark:text-brandGrayDark">ECOMMERCE</h2>

            <div class="cursor-pointer" x-data="toggler">
                <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                    @click="toggle">
                    <div class="flex items-center gap-2">
                        <x-ri-list-check class="w-4 h-4" />
                        <p>Manage Categories</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex flex-col gap-1 py-1 pl-10 transition-all duration-500">
                    <li>Categories</li>
                    <li>Sub Categories</li>
                </ul>
            </div>

            <div class="cursor-pointer" x-data="toggler">
                <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                    @click="toggle">
                    <div class="flex items-center gap-2">
                        <x-bi-box-seam class="w-4 h-4" />
                        <p>Manage Products</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
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
                        <x-ri-file-list-3-line class="w-4 h-4" />
                        <p>Orders</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
                    <li>All Orders </li>
                    <li>New Orders </li>
                    <li>Created Orders </li>
                    <li>Processing Orders </li>
                    <li>Out For Delivery Orders </li>
                    <li>Delivered Orders</li>
                </ul>
            </div>

            <div class="cursor-pointer" x-data="toggler">
                <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                    @click="toggle">
                    <div class="flex items-center gap-2">
                        <x-ri-store-3-line class="w-4 h-4" />
                        <p>Ecommerce</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
                    <li>Flash Sale </li>
                    <li>Coupons</li>
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
        </div>

        <div class="flex flex-col gap-6">
            <h2 class="ml-2 text-xs text-brandGray dark:text-brandGrayDark">lOGS</h2>

            <div class="cursor-pointer" x-data="toggler">
                <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                    @click="toggle">
                    <div class="flex items-center gap-2">
                        <x-ri-money-dollar-box-line class="w-4 h-4" />
                        <p>Transactions</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
                    <li>All Transactions</li>
                    <li>Successful Transactions</li>
                    <li>Failed Transactions</li>
                </ul>
            </div>

            <div class="cursor-pointer" x-data="toggler">
                <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                    @click="toggle">
                    <div class="flex items-center gap-2">
                        <x-ri-notification-2-line class="w-4 h-4" />
                        <p>Activities</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
                    <li>User Activities</li>
                    <li>Vendor Activities</li>
                    <li>Admin Activities</li>
                </ul>
            </div>
        </div>


        <div class="flex flex-col gap-6">
            <h2 class="ml-2 text-xs text-brandGray dark:text-brandGrayDark">SETTINGS</h2>

            <div class="cursor-pointer" x-data="toggler">
                <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                    @click="toggle">
                    <div class="flex items-center gap-2">
                        <x-ri-folder-settings-line class="w-4 h-4" />
                        <p>Manage Website</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
                    <li>Slider </li>
                    <li>Home Page </li>
                    <li>Vendor Condition </li>
                    <li>About Page</li>
                    <li>Terms Page</li>
                </ul>
            </div>

            <div class="cursor-pointer" x-data="toggler">
                <div class="relative flex items-center justify-between w-full px-4 {{ request()->routeIs('vendor.dashboard') ? 'text-brandRed dark:text-brandRedDark' : '' }}"
                    @click="toggle">
                    <div class="flex items-center gap-2">
                        <x-ri-user-settings-line class="w-4 h-4" />
                        <p>Manage Users</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
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
                        <x-ri-settings-4-line class="w-4 h-4" />
                        <p>Settings</p>
                    </div>
                    <div :class="open ? 'rotate-180' : ''" class="transition-all duration-300">
                        <x-ri-arrow-up-s-line class="w-4 h-4 text-brandGrayDark dark:text-brandGray" />
                    </div>
                    @if (request()->routeIs('vendor.dashboard'))
                        <div class="absolute top-0 bottom-0 left-0 w-1 rounded-full bg-brandRed dark:bg-brandRedDark">
                        </div>
                    @endif
                </div>
                <ul x-cloak :class="open ? 'flex' : 'hidden'"
                    class="flex-col gap-1 py-1 pl-10 transition-all duration-500">
                    <li>General Setting</li>
                    <li>Change Password</li>
                    <li>Payment Settings</li>
                </ul>
            </div>
        </div>
    </nav>
</div>
