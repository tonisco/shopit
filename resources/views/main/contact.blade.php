<x-main.layout.main page="Contact">
    <x-main.layout.breadcrumbs heading='contact us' :crumbs="[['name' => 'home', 'route' => route('home')], ['name' => 'contact us']]" />
    <div class="relative">
        <div class="absolute flex w-full h-full gap-6 px-2 overflow-x-hidden">
            <iframe src="{{ $settings->map_url }}" width="100%" height="100%" style="border:0;" allowfullscreen=""
                loading="lazy" tabindex="-1" referrerpolicy="no-referrer-when-downgrade"
                class="absolute z-0 w-full h-full"></iframe>
        </div>
        {{-- TODO: change form position on mobile view --}}
        <div class="flex justify-end w-full px-2 mx-auto max-w-7xl">
            <div class="z-10 flex flex-col gap-4 p-8 my-20 bg-white dark:bg-gray-800 rounded-lg shadow-lg w-[450px]">
                <h1 class="text-gray-500 dark:text-gray-400">Send us a Message</h1>
                <h1 class="mb-5 text-4xl font-bold text-gray-800 dark:text-gray-200">Contact Us</h1>
                <div class="flex flex-col items-start w-full gap-2 text-gray-800 dark:text-gray-200">
                    <label for="fullname">Full Name</label>
                    <input id="fullname" type="text" required
                        class="w-full border-gray-300 rounded-md focus:ring-brandRed dark:focus:ring-brandRedDark focus:border-brandRed dark:focus:border-brandRedDark" />
                </div>
                <div class="flex flex-col items-start w-full gap-2 text-gray-800 dark:text-gray-200">
                    <label for="email">Email</label>
                    <input id="email" type="email" required
                        class="w-full border-gray-300 rounded-md focus:ring-brandRed dark:focus:ring-brandRedDark focus:border-brandRed dark:focus:border-brandRedDark" />
                </div>
                <div class="flex flex-col items-start w-full gap-2 text-gray-800 dark:text-gray-200">
                    <label for="subject">Subject</label>
                    <input id="subject" type="text" required
                        class="w-full border-gray-300 rounded-md focus:ring-brandRed dark:focus:ring-brandRedDark focus:border-brandRed dark:focus:border-brandRedDark" />
                </div>
                <div class="flex flex-col items-start w-full gap-2 text-gray-800 dark:text-gray-200">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10"
                        class="w-full border-gray-300 rounded-md focus:ring-brandRed dark:focus:ring-brandRedDark focus:border-brandRed dark:focus:border-brandRedDark"></textarea>
                </div>

                <button
                    class="self-center px-6 py-1 text-white bg-brandRed rounded-lg dark:bg-brandRedDark">Send</button>
            </div>
        </div>
    </div>
</x-main.layout.main>
