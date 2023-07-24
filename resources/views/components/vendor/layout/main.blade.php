@extends('layouts.app')

@section('page')
    {{ $page }}
@endsection

@php
    $vendor = App\Models\Vendor::where('user_id', auth()->user()->id)->first();
@endphp

@section('content')
    <div class="flex w-full">
        <div class="hidden lg:flex">
            <x-vendor.layout.sidebar />
        </div>
        <div class="flex flex-col flex-1">
            <header class="flex justify-between flex-1 items-center px-4 py-2 text-white bg-red-500 dark:bg-red-700">
                <div>
                    <x-ri-menu-fill class="h-5 sm:h-6 w-5 sm:w-6 cursor-pointer block lg:hidden" />
                </div>
                <div class="hidden sm:block">
                    <x-general.layout.logo />
                </div>
                <div class="flex items-center gap-2">
                    <img src="{{ asset($vendor->image) }}" class="object-cover w-6 sm:w-8 h-6 sm:h-8 rounded-full" />
                    <p class="max-w-[110px] sm:text-base text-sm truncate">{{ $vendor->name }}</p>
                    <x-general.layout.theme />
                </div>
            </header>
            {{ $slot }}
        </div>
    </div>
    <x-vendor.layout.footer />
@endsection
