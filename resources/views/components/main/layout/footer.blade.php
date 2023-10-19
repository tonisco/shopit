<footer class="mt-auto bg-white dark:bg-brandDark">
    <div class="max-w-screen-xl px-4 py-16 mx-auto space-y-8 sm:px-6 lg:space-y-16 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div>
                <x-general.layout.logo />

                <p class="max-w-xs mt-4 text-brandDark dark:text-brandLight">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse non
                    cupiditate quae nam molestias.
                </p>

                <ul class="flex gap-6 mt-8">
                    <li>
                        <a href="https://facebook.com" rel="noreferrer" target="_blank"
                            class="transition text-brandRed dark:text-brandRedDark hover:opacity-80">
                            <span class="sr-only">Facebook</span>

                            <x-ri-facebook-circle-fill class="w-6 h-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://instagram.com" rel="noreferrer" target="_blank"
                            class="transition text-brandRed dark:text-brandRedDark hover:opacity-80">
                            <span class="sr-only">Instagram</span>

                            <x-ri-instagram-line class="w-6 h-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://twitter.com" rel="noreferrer" target="_blank"
                            class="transition text-brandRed dark:text-brandRedDark hover:opacity-80">
                            <span class="sr-only">Twitter</span>

                            <x-ri-twitter-fill class="w-6 h-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://github.com" rel="noreferrer" target="_blank"
                            class="transition text-brandRed dark:text-brandRedDark hover:opacity-80">
                            <span class="sr-only">GitHub</span>

                            <x-ri-github-fill class="w-6 h-6" />
                        </a>
                    </li>

                    <li>
                        <a href="https://dribble.com" rel="noreferrer" target="_blank"
                            class="transition text-brandRed dark:text-brandRedDark hover:opacity-80">
                            <span class="sr-only">Dribbble</span>

                            <x-ri-dribbble-fill class="w-6 h-6" />
                        </a>
                    </li>
                </ul>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
                <div>
                    <p
                        class="font-medium underline text-brandDarker decoration-brandGrayDark dark:decoration-brandLight dark:text-brandLighter">
                        Quick Shop</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('products', ['category' => 'men']) }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Men
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'women']) }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Women
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'children']) }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Children
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'clothing']) }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Clothing
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products', ['category' => 'shoes']) }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Shoes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products', ['category' => 'accessories']) }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Accessories
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p
                        class="font-medium underline text-brandDarker decoration-brandGrayDark dark:decoration-brandLight dark:text-brandLighter">
                        Company</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('about') }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Meet the Team
                            </a>
                        </li>

                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Accounts Review
                            </a>
                        </li>
                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Career
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p
                        class="font-medium underline text-brandDarker decoration-brandGrayDark dark:decoration-brandLight dark:text-brandLighter">
                        Helpful Links</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="{{ route('contact') }}"
                                class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Contact
                            </a>
                        </li>

                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                FAQs
                            </a>
                        </li>

                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Affiliate
                            </a>
                        </li>
                        <li>
                            <a href="#" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Track Order
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p
                        class="font-medium underline text-brandDarker decoration-brandGrayDark dark:decoration-brandLight dark:text-brandLighter">
                        Legal</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Accessibility
                            </a>
                        </li>

                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Returns Policy
                            </a>
                        </li>

                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Refund Policy
                            </a>
                        </li>

                        <li>
                            <a href="/" class="transition text-brandDark dark:text-brandLight hover:opacity-80">
                                Vendor Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-xs text-brandDark dark:text-brandLight">
            &copy; 2022. {{ $settings->site_name }}. All rights reserved.
        </p>
    </div>
</footer>
