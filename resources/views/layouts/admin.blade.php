@extends('layouts.app')
@php
    $admin = auth()->user();
@endphp
@section('content')
    <div class="flex flex-1 h-full">
        <div class="flex flex-col flex-1 overflow-x-hidden">
            <header
                class="fixed top-0 left-0 right-0 z-10 flex items-center justify-between w-full px-4 py-2 text-white bg-brandRed dark:bg-brandRedDark">
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
                    <x-fas-user-circle class="w-6 h-6 text-brandWhite dark:text-brandGray sm:w-8 sm:h-8" />
                    <p class="max-w-[110px] sm:text-sm text-xs truncate">
                        {{ $admin->first_name . ' ' . $admin->last_name }}
                    </p>
                    <x-general.layout.theme />
                </div>
            </header>
            <div class="flex mt-12">
                <x-admin.layout.sidebar />
                @yield('admin-content')
            </div>
        </div>
    </div>
@endsection
