<footer class="bg-white dark:bg-gray-800 mt-auto">
    <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div>
                <x-layout.logo />

                <p class="mt-4 max-w-xs text-gray-800 dark:text-gray-200">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse non
                    cupiditate quae nam molestias.
                </p>

                <ul class="mt-8 flex gap-6">
                    <li>
                        <a href="https://facebook.com" rel="noreferrer" target="_blank"
                            class="text-red-500 dark:text-red-700 transition hover:opacity-75">
                            <span class="sr-only">Facebook</span>

                            <x-ri-facebook-circle-fill class="h-6 w-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://instagram.com" rel="noreferrer" target="_blank"
                            class="text-red-500 dark:text-red-700 transition hover:opacity-75">
                            <span class="sr-only">Instagram</span>

                            <x-ri-instagram-line class="h-6 w-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://twitter.com" rel="noreferrer" target="_blank"
                            class="text-red-500 dark:text-red-700 transition hover:opacity-75">
                            <span class="sr-only">Twitter</span>

                            <x-ri-twitter-fill class="h-6 w-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://github.com" rel="noreferrer" target="_blank"
                            class="text-red-500 dark:text-red-700 transition hover:opacity-75">
                            <span class="sr-only">GitHub</span>

                            <x-ri-github-fill class="h-6 w-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://dribble.com" rel="noreferrer" target="_blank"
                            class="text-red-500 dark:text-red-700 transition hover:opacity-75">
                            <span class="sr-only">Dribbble</span>

                            <x-ri-dribbble-fill class="h-6 w-6" />
                        </a>
                    </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
                <div>
                    <p
                        class="font-medium text-gray-900 underline decoration-gray-500 dark:decoration-gray-300 dark:text-gray-100">
                        Quick Shop</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('products', ['category' => 'men']) }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Men
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'women']) }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Women
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'children']) }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Children
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'clothing']) }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Clothing
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'shoes']) }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Shoes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products', ['category' => 'accessories']) }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Accessories
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p
                        class="font-medium text-gray-900 underline decoration-gray-500 dark:decoration-gray-300 dark:text-gray-100">
                        Company</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('about') }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Meet the Team
                            </a>
                        </li>

                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Accounts Review
                            </a>
                        </li>
                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Career
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p
                        class="font-medium text-gray-900 underline decoration-gray-500 dark:decoration-gray-300 dark:text-gray-100">
                        Helpful Links</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('contact') }}"
                                class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Contact
                            </a>
                        </li>

                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                FAQs
                            </a>
                        </li>

                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Affiliate
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Track Order
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p
                        class="font-medium text-gray-900 underline decoration-gray-500 dark:decoration-gray-300 dark:text-gray-100">
                        Legal</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Accessibility
                            </a>
                        </li>

                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Returns Policy
                            </a>
                        </li>

                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Refund Policy
                            </a>
                        </li>

                        <li>
                            <a href="/" class="text-gray-800 dark:text-gray-200 transition hover:opacity-75">
                                Vendor Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-xs text-gray-800 dark:text-gray-200">
            &copy; 2022. Shopit. All rights reserved.
        </p>
    </div>
</footer>
