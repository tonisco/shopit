@extends('layouts.app')

@section('content')
    <x-layout.breadcrumbs heading='Vendors' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'vendors']]" />
    <div class="w-full px-4 my-10">
        <div class="grid w-full grid-cols-1 gap-6 mx-auto sm:grid-cols-2 max-w-7xl">
            @foreach ($vendors as $vendor)
                <div class="relative w-full overflow-hidden h-72 rounded-xl">
                    <img src="{{ asset($vendor->image) }}" alt="{{ $vendor->name }}">
                    <div
                        class="absolute top-0 left-0 flex flex-col justify-center w-full h-full gap-2 p-4 text-white bg-black/30">
                        <h3 class="text-3xl capitalize">{{ $vendor->name }}</h3>
                        <p class="flex items-center gap-2">
                            <x-ri-mail-line class="w-5 h-5 text-white" /><span>{{ $vendor->email }}</span>
                        </p>
                        <p class="flex items-center gap-2">
                            <x-ri-map-pin-line class="w-5 h-5 text-white" />
                            <span>{{ $vendor->address }}</span>
                        </p>
                        <p class="flex items-center gap-2">
                            <x-ri-phone-fill class="w-5 h-5 text-white" /><span>{{ $vendor->phone }}</span>
                        </p>
                        <a class="self-start px-4 py-2 mt-2 text-white capitalize transition-all duration-300 bg-red-500 rounded-full dark:bg-red-700 hover:bg-red-600"
                            href="{{ route('vendors-products', $vendor->id) }}">Visit
                            store</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $vendors->links() }}
    </div>
@endsection
