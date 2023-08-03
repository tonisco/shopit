@extends('layouts.app')

@section('page')
    {{ $page }}
@endsection

@php
    $vendor = App\Models\Vendor::where('user_id', auth()->user()->id)->first();
@endphp

@section('content')
    <div class="flex flex-1 w-screen h-full">
        <div class="flex flex-col flex-1">
            <header
                class="fixed top-0 left-0 right-0 z-10 flex items-center justify-between w-full px-4 py-2 text-white bg-red-500 dark:bg-red-700">
                <div class="block lg:hidden" x-data="toggler" @click="toggle">
                    <x-ri-menu-fill class="w-5 h-5 cursor-pointer sm:h-6 sm:w-6 " />
                    <template x-teleport="body">

                        <x-general.layout.nav-modal ::show="open" ::toggle="toggle">
                            <x-vendor.layout.sidebar />
                        </x-general.layout.nav-modal>
                    </template>
                </div>
                <div class="hidden sm:block">
                    <x-general.layout.logo />
                </div>
                <div class="flex items-center gap-2">
                    <img src="{{ asset($vendor->image) }}" class="object-cover w-6 h-6 rounded-full sm:w-8 sm:h-8" />
                    <p class="max-w-[110px] sm:text-base text-sm truncate">{{ $vendor->name }}</p>
                    <x-general.layout.theme />
                </div>
            </header>
            <div class="flex mt-12">
                <div
                    class="fixed top-12 left-0 hidden lg:block h-[calc(100vh-48px)] overflow-hidden w-[210px] bg-gray-100 dark:bg-gray-800 shadow-lg">
                    <x-vendor.layout.sidebar />
                </div>
                <div class="lg:ml-[210px] w-full">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
@endsection
