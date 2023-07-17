@extends('layouts.app')

@section('content')
    <x-layout.breadcrumbs heading='products' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'product']]" />
    <div class="max-w-7xl w-full mx-auto px-2 my-10 flex gap-6">
        <div class="hidden lg:flex flex-col gap-4 w-1/5">
            filter
        </div>
        <div class="w-full lg:w-4/5 ">
            <div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full">
                @foreach ($products as $product)
                    <x-layout.productcard :product="$product" />
                @endforeach

            </div>
        </div>
    </div>
@endsection
