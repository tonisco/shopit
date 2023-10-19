<x-main.layout.main page="Login / Register">
    <x-main.layout.breadcrumbs heading='login / register' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'login / register']]" />
    <section class="w-full px-2 mx-auto my-10 max-w-7xl">
        <div x-data="toggler"
            class="flex flex-col w-11/12 gap-2 px-4 py-8 mx-auto bg-white shadow-lg dark:bg-gray-800 md:w-3/4 lg:w-1/2 rounded-xl">
            <div class="flex w-full">
                <button
                    class="flex-1 py-2 text-lg text-gray-800 border-b-2 border-gray-200 sm:text-xl dark:text-gray-200 dark:border-gray-700"
                    x-bind:class="{ 'text-brandRed dark:text-brandRedDark border-brandRed dark:border-brandRedDark': !open }"
                    @click="change(false)">Login</button>
                <button
                    class="flex-1 py-2 text-lg text-gray-800 border-b-2 border-gray-200 sm:text-xl dark:text-gray-200 dark:border-gray-700"
                    x-bind:class="{ 'text-brandRed dark:text-brandRedDark border-brandRed dark:border-brandRedDark': open }"
                    @click="change(true)">Sign Up</button>
            </div>


            <div class="flex flex-col justify-center w-full mt-8">
                <a href="{{ route('google-login') }}"
                    class="!w-3/4 py-2 px-4 mx-auto text-center text-white bg-brandRed dark:bg-brandRedDark">Continue
                    with
                    Google</a>
                @error('oauth')
                    <div class="mt-1 text-center">
                        <x-general.input.input-error :messages="$message" />
                    </div>
                @enderror
            </div>

            <h2 class="text-xl text-center text-gray-800 dark:text-gray-200">Or</h2>

            <div x-show="!open">
                <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-6 px-2 sm:px-4">
                    @csrf
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="login_email">Email</label>
                        <input type="email" value="{{ old('email') }}" required
                            class="border-2 rounded focus:border-brandRed dark:focus:border-brandRedDark focus:ring-brandRed dark:focus:ring-brandRedDark "
                            name="email" id="login_email">
                        @error('email')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="login_password">Password</label>
                        <input type="password" required
                            class="border-2 rounded focus:border-brandRed dark:focus:border-brandRedDark focus:ring-brandRed dark:focus:ring-brandRedDark "
                            name="password" id="login_password">
                        @error('password')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="remember" id="login_remember">
                            <label for="login_remember"
                                class="text-xs text-gray-800 sm:text-sm dark:text-gray-200">Remember
                                me</label>
                        </div>
                        <p class="text-xs text-brandRed sm:text-sm dark:text-brandRedDark">Forgot Password?</p>
                    </div>

                    <button type="submit"
                        class="self-start px-8 py-2 text-white transition bg-brandRed hover:bg-red-600 dark:bg-brandRedDark">Login</button>
                </form>
            </div>
            <div x-show="open" x-cloak>
                <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-6 px-4">
                    @csrf
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_email">First Name</label>
                        <input type="text" required
                            class="border-2 rounded focus:border-brandRed dark:focus:border-brandRedDark focus:ring-brandRed dark:focus:ring-brandRedDark "
                            name="first_name" id="signup_first_name" value="{{ old('first_name') }}">
                        @error('first_name', 'register')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_email">Last Name</label>
                        <input type="text" required
                            class="border-2 rounded focus:border-brandRed dark:focus:border-brandRedDark focus:ring-brandRed dark:focus:ring-brandRedDark "
                            name="last_name" id="signup_last_name" value="{{ old('last_name') }}">
                        @error('last_name', 'register')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_email">Email</label>
                        <input type="email" required
                            class="border-2 rounded focus:border-brandRed dark:focus:border-brandRedDark focus:ring-brandRed dark:focus:ring-brandRedDark "
                            name="email" id="signup_email" value="{{ old('email') }}">
                        @error('email', 'register')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_password">Password</label>
                        <input type="password" required
                            class="border-2 rounded focus:border-brandRed dark:focus:border-brandRedDark focus:ring-brandRed dark:focus:ring-brandRedDark "
                            name="password" id="signup_password">
                        @error('password', 'register')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label class="text-gray-800 dark:text-gray-200" for="signup_password_confirmation">Confirm
                            Password</label>
                        <input type="password" required
                            class="border-2 rounded focus:border-brandRed dark:focus:border-brandRedDark focus:ring-brandRed dark:focus:ring-brandRedDark "
                            name="password_confirmation" id="signup_password_confirmation">
                        @error('password_confirmation', 'register')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>


                    <button type="submit"
                        class="self-start px-8 py-2 text-white transition bg-brandRed hover:bg-red-600 dark:bg-brandRedDark">Sign
                        Up</button>
                </form>
            </div>

        </div>
    </section>
</x-main.layout.main>
