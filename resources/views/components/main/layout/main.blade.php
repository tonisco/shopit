@extends('layouts.app')

@section('page')
    {{ $page }}
@endsection

@section('content')
    <x-main.layout.topnav />
    <nav class="relative flex flex-no-wrap items-center justify-between w-full py-2 bg-brandRed shadow-md dark:bg-brandRedDark lg:bg-white lg:py-1 shadow-black/5 lg:dark:bg-brandDark dark:shadow-black/10 lg:flex-wrap lg:justify-start"
        data-te-navbar-ref>
        <div class="container flex flex-wrap items-center justify-between flex-1 px-3 py-2 lg:py-0 lg:mx-auto max-w-7xl">
            <button
                class="block px-2 text-brandGrayDark bg-transparent border-0 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-brandLight lg:hidden"
                type="button" data-te-collapse-init data-te-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                <x-ri-menu-2-fill class="text-brandLight h-7 w-7" />
            </button>

            <a href="{{ route('home') }}" class="text-brandLight cursor-pointer lg:hidden">
                <x-general.layout.logo />
            </a>

            <div class="hidden flex-grow basis-[100%] items-center gap-2 lg:!flex lg:basis-auto"
                id="navbarSupportedContent1" data-te-collapse-item>

                <x-main.layout.mega-menu />

                <x-main.layout.navlinks />
            </div>

            <div class="relative flex items-center gap-4 ml-2 lg:ml-0">
                <a
                    class="cursor-pointer relative lg:hidden text-brandDarker transition duration-200 hover:text-brandDark hover:ease-in-out focus:text-brandDark disabled:text-black/30 motion-reduce:transition-none dark:text-brandLight dark:hover:text-brandLight dark:focus:text-brandLight [&.active]:text-black/90 dark:[&.active]:text-brandGray">
                    <x-ri-shopping-cart-line class="w-6 h-6 text-brandLight" />
                    <span
                        class="absolute -top-2.5 -right-2.5 ml-2.5 rounded-full bg-teal-500 dark:bg-teal-700 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">1</span>
                </a>

                <a
                    class="cursor-pointer relative lg:hidden text-brandDarker transition duration-200 hover:text-brandDark hover:ease-in-out focus:text-brandDark disabled:text-black/30 motion-reduce:transition-none dark:text-brandLight dark:hover:text-brandLight dark:focus:text-brandLight [&.active]:text-black/90 dark:[&.active]:text-brandGray">
                    <x-ri-heart-line class="w-6 h-6 text-brandLight" />
                    <span
                        class="absolute -top-2.5 -right-2.5 ml-2.5 rounded-full bg-teal-500 dark:bg-teal-700 px-1.5 py-1 text-[0.6rem] font-bold leading-none text-white">1</span>
                </a>

                <div class="lg:hidden">
                    <x-general.layout.theme />
                </div>

                <a
                    class="cursor-pointer text-brandDarker hidden lg:inline-block transition duration-200 hover:text-brandDark hover:ease-in-out focus:text-brandDark disabled:text-black/30 motion-reduce:transition-none dark:text-brandLight dark:hover:text-brandLight dark:focus:text-brandLight [&.active]:text-black/90 dark:[&.active]:text-brandGray">
                    Track Order
                </a>
                {{-- TODO: show login on mobile screen --}}
                @if (auth()->check())
                    @if (auth()->user()->role === 'user')
                        <a href="{{ route('dashboard') }}"
                            class="cursor-pointer text-brandDarker transition hidden lg:inline-block duration-200 hover:text-brandDark hover:ease-in-out focus:text-brandDark disabled:text-black/30 motion-reduce:transition-none dark:text-brandLight dark:hover:text-brandLight dark:focus:text-brandLight [&.active]:text-black/90 dark:[&.active]:text-brandGray">
                            My Account
                        </a>
                    @elseif (auth()->user()->role === 'vendor')
                        <a href="{{ route('vendor.dashboard') }}"
                            class="cursor-pointer text-brandDarker transition hidden lg:inline-block duration-200 hover:text-brandDark hover:ease-in-out focus:text-brandDark disabled:text-black/30 motion-reduce:transition-none dark:text-brandLight dark:hover:text-brandLight dark:focus:text-brandLight [&.active]:text-black/90 dark:[&.active]:text-brandGray">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}"
                            class="cursor-pointer text-brandDarker transition hidden lg:inline-block duration-200 hover:text-brandDark hover:ease-in-out focus:text-brandDark disabled:text-black/30 motion-reduce:transition-none dark:text-brandLight dark:hover:text-brandLight dark:focus:text-brandLight [&.active]:text-black/90 dark:[&.active]:text-brandGray">
                            Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="cursor-pointer text-brandDarker transition hidden lg:inline-block duration-200 hover:text-brandDark hover:ease-in-out focus:text-brandDark disabled:text-black/30 motion-reduce:transition-none dark:text-brandLight dark:hover:text-brandLight dark:focus:text-brandLight [&.active]:text-black/90 dark:[&.active]:text-brandGray">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </nav>
    {{ $slot }}
    <x-main.layout.footer />
@endsection
