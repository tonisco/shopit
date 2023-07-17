@extends('layouts.app')


@section('content')
    <div class="flex flex-col flex-1 gap-16 px-4 mx-auto my-4 max-w-7xl sm:px-6">

        <div id="carousel" class="relative" data-te-carousel-init data-te-carousel-slide>

            <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                data-te-carousel-indicators>
                @foreach ($sliders as $slider)
                    <button type="button" data-te-target="#carousel" data-te-slide-to="{{ $loop->index }}"
                        @if ($loop->first) data-te-carousel-active @endif
                        class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                        aria-current="true"></button>
                @endforeach
            </div>

            <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">

                <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-active data-te-carousel-item style="backface-visibility: hidden">
                    <img src="{{ asset($sliders[0]['image']) }}" class="block w-full" alt="..." />
                    <div class="absolute inset-y-0 h-full left-6 hidden py-5 z-[2] text-center text-black md:block">
                        <div class="flex flex-col items-start justify-center h-full gap-4">
                            <p class="font-medium text-red-500 capitalize dark:text-red-700">{{ $sliders[0]->top_text }}</p>
                            <h1 class="text-5xl font-bold capitalize">{{ $sliders[0]['title'] }}</h1>
                            <p class="font-medium text-red-500 capitalize dark:text-red-700">
                                {{ $sliders[0]->bottom_text }}
                            </p>
                            @if ($sliders[0]->btn_url)
                                <a type="button" href='/{{ $sliders[0]->btn_url }}'
                                    class="inline-block rounded-full bg-red-500 px-6 pb-2 pt-2.5 text-base font-medium uppercase leading-normal text-white dark:text-gray-200 shadow-[0_4px_9px_-4px_#ef4444] transition duration-150 ease-in-out hover:bg-red-600 hover:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.3),0_4px_18px_0_rgba(239, 68, 68,0.2)] focus:bg-red-600 focus:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.3),0_4px_18px_0_rgba(239, 68, 68,0.2)] focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.3),0_4px_18px_0_rgba(239, 68, 68,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(239, 68, 68,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.2),0_4px_18px_0_rgba(239, 68, 68,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.2),0_4px_18px_0_rgba(239, 68, 68,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.2),0_4px_18px_0_rgba(239, 68, 68,0.1)] dark:bg-red-700">
                                    Shop Now
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                @foreach ($sliders as $slider)
                    @if (!$loop->first)
                        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                            data-te-carousel-item style="backface-visibility: hidden">
                            <img src="{{ asset($slider->image) }}" class="block w-full" alt="..." />
                            <div class="absolute inset-y-0 z-[2] h-full left-6 hidden py-5 text-center text-black md:block">
                                <div class="flex flex-col items-start justify-center h-full gap-2">
                                    <p class="font-medium text-red-500 capitalize dark:text-red-700">{{ $slider->top_text }}
                                    </p>
                                    <h1 class="text-5xl font-bold capitalize">{{ $slider->title }}</h1>
                                    <p class="font-medium text-red-500 capitalize dark:text-red-700">
                                        {{ $slider->bottom_text }}
                                    </p>
                                    @if ($slider->btn_url)
                                        <a type="button" href='/{{ $slider->btn_url }}'
                                            class="inline-block rounded-full bg-red-500 px-6 pb-2 pt-2.5 text-base font-medium uppercase leading-normal text-white dark:text-gray-200 shadow-[0_4px_9px_-4px_#ef4444] transition duration-150 ease-in-out hover:bg-red-600 hover:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.3),0_4px_18px_0_rgba(239, 68, 68,0.2)] focus:bg-red-600 focus:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.3),0_4px_18px_0_rgba(239, 68, 68,0.2)] focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.3),0_4px_18px_0_rgba(239, 68, 68,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(239, 68, 68,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.2),0_4px_18px_0_rgba(239, 68, 68,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.2),0_4px_18px_0_rgba(239, 68, 68,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(239, 68, 68,0.2),0_4px_18px_0_rgba(239, 68, 68,0.1)] dark:bg-red-700">
                                            Shop Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <button
                    class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-80 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button" data-te-target="#carousel" data-te-slide="prev">
                    <x-ri-arrow-left-s-line class="inline-block w-8 h-8" />
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                </button>

                <button
                    class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-80 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                    type="button" data-te-target="#carousel" data-te-slide="next">
                    <x-ri-arrow-right-s-line class="inline-block w-8 h-8" />
                    <span
                        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                </button>
            </div>
        </div>

        <div class="flex flex-col gap-6" id="exclusive products">

            <div class="flex items-center justify-between h-16">
                <div class="flex-1 md:flex md:items-center">
                    <p class="block text-2xl font-medium text-gray-800 dark:text-gray-200">
                        Exclusive Products
                    </p>
                </div>

                <div class="md:flex md:items-center">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-4 text-base">
                            <li class="text-gray-800 transition dark:text-gray-200 hover:text-gray-500/75">
                                New Arrival
                            </li>

                            <li class="text-gray-800 transition dark:text-gray-200 hover:text-gray-500/75">
                                Best Seller
                            </li>

                            <li class="text-gray-800 transition dark:text-gray-200 hover:text-gray-500/75">
                                Featured
                            </li>

                            <li class="text-gray-800 transition dark:text-gray-200 hover:text-gray-500/75">
                                Special Offer
                            </li>

                        </ul>
                    </nav>

                    <div class="flex items-center gap-4">
                        <div class="relative block md:hidden" data-te-dropdown-ref>
                            <button type="button" id="dropdownMenuButton2" data-te-ripple-init data-te-dropdown-toggle-ref
                                data-te-ripple-color="light"
                                class="p-2 text-gray-600 transition bg-gray-200 rounded hover:text-gray-600/75">
                                <x-ri-menu-fill class="w-5 h-5" />
                            </button>
                            <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-gray-800 [&[data-te-dropdown-show]]:block"
                                aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                                <li class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-gray-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-gray-600"
                                    data-te-dropdown-item-ref>
                                    New Arrival
                                </li>
                                <li class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-gray-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-gray-600"
                                    data-te-dropdown-item-ref>
                                    Best Seller
                                </li>
                                <li class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-gray-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-gray-600"
                                    data-te-dropdown-item-ref>
                                    Featured
                                </li>
                                <li class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-gray-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-gray-600"
                                    data-te-dropdown-item-ref>
                                    Special Offer
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 mx-auto sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                    <x-layout.productcard :product="$product" />
                @endforeach
            </div>

        </div>
    </div>
@endsection
