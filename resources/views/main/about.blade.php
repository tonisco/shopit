@extends('layouts.app')

@section('page')
    About
@endsection

@section('content')
    <x-layout.breadcrumbs heading='about' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'about']]" />
    <div class="w-full px-2 mx-auto my-10 max-w-7xl">
        {{-- TODO: redesign about page --}}
        <div class="flex flex-col w-full gap-6 p-10 bg-white shadow-lg rounded-xl">
            <h1 class="text-4xl font-semibold text-center text-gray-800 dark:text-gray-200">About Us</h1>

            <div class="flex flex-col gap-2 [&>*]:indent-8 [&>*]:text-base [&>*]:leading-8">{!! $about->content !!}
            </div>
        </div>
    </div>
@endsection
