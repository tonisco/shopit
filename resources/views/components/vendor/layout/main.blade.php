@extends('layouts.app')

@section('page')
    {{ $page }}
@endsection

@php
    $vendor = App\Models\Vendor::where('user_id', auth()->user()->id)->first();
@endphp

@section('content')
    <div class="flex flex-1 w-full h-full">
        <div class="relative hidden lg:flex">
            <x-vendor.layout.sidebar />
        </div>
        <div class="flex flex-col flex-1">
            <header class="flex items-center justify-between w-full px-4 py-2 text-white bg-red-500 dark:bg-red-700">
                <div>
                    <x-ri-menu-fill class="block w-5 h-5 cursor-pointer sm:h-6 sm:w-6 lg:hidden" />
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
            {{ $slot }}
        </div>
    </div>
@endsection
