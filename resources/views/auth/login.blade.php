@extends('layouts.app')

@section('page')
    Login / Register
@endsection

@section('content')
    <x-layout.breadcrumbs heading='login / register' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'login / register']]" />
    <section class="w-full px-2 mx-auto my-10 max-w-7xl">
        <div x-data="toggler"
            class="w-11/12 px-4 py-8 mx-auto space-y-6 bg-white shadow-lg dark:bg-gray-800 md:w-3/4 lg:w-1/2 rounded-xl">
            <div class="flex w-full">
                <button
                    class="flex-1 py-2 text-lg text-gray-800 border-b-2 border-gray-200 sm:text-xl dark:text-gray-200 dark:border-gray-700"
                    x-bind:class="{ 'text-red-500 dark:text-red-700 border-red-500 dark:border-red-700': !open }"
                    @click="change(false)">Login</button>
                <button
                    class="flex-1 py-2 text-lg text-gray-800 border-b-2 border-gray-200 sm:text-xl dark:text-gray-200 dark:border-gray-700"
                    x-bind:class="{ 'text-red-500 dark:text-red-700 border-red-500 dark:border-red-700': open }"
                    @click="change(true)">Sign Up</button>
            </div>
            <div x-show="!open">
                <form action="" class="px-2 space-y-8 sm:px-4">
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="login_email">Email</label>
                        <input type="email"
                            class="border-2 rounded focus:border-red-500 dark:focus:border-red-700 focus:ring-red-500 dark:focus:ring-red-700 "
                            name="email" id="login_email">
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="login_password">Password</label>
                        <input type="password"
                            class="border-2 rounded focus:border-red-500 dark:focus:border-red-700 focus:ring-red-500 dark:focus:ring-red-700 "
                            name="password" id="login_password">
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="remember" id="login_remember">
                            <label for="login_remember" class="text-xs text-gray-800 sm:text-sm dark:text-gray-200">Remember
                                me</label>
                        </div>
                        <p class="text-xs text-red-500 sm:text-sm dark:text-red-700">Forgot Password?</p>
                    </div>

                    <button type="submit"
                        class="px-8 py-2 text-white transition bg-red-500 hover:bg-red-600 dark:bg-red-700">Login</button>
                </form>
            </div>
            <div x-show="open" x-cloak>
                <form action="" class="px-4 space-y-6">
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_email">First Name</label>
                        <input type="text"
                            class="border-2 rounded focus:border-red-500 dark:focus:border-red-700 focus:ring-red-500 dark:focus:ring-red-700 "
                            name="first_name" id="signup_first_name">
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_email">Last Name</label>
                        <input type="text"
                            class="border-2 rounded focus:border-red-500 dark:focus:border-red-700 focus:ring-red-500 dark:focus:ring-red-700 "
                            name="last_name" id="signup_last_name">
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_email">Email</label>
                        <input type="email"
                            class="border-2 rounded focus:border-red-500 dark:focus:border-red-700 focus:ring-red-500 dark:focus:ring-red-700 "
                            name="email" id="signup_email">
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_password">Password</label>
                        <input type="password"
                            class="border-2 rounded focus:border-red-500 dark:focus:border-red-700 focus:ring-red-500 dark:focus:ring-red-700 "
                            name="password" id="signup_password">
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_password">Confirm Password</label>
                        <input type="password"
                            class="border-2 rounded focus:border-red-500 dark:focus:border-red-700 focus:ring-red-500 dark:focus:ring-red-700 "
                            name="confirm_password" id="signup_confirm_password">
                    </div>


                    <button type="submit"
                        class="px-8 py-2 text-white transition bg-red-500 hover:bg-red-600 dark:bg-red-700">Sign Up</button>
                </form>
            </div>
        </div>
    </section>
@endsection
