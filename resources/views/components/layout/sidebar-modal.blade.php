<div class="fixed top-0 bottom-0 left-0 right-0 z-50 flex justify-end bg-black/25" x-show="open" @click="toggle">
    <nav class="h-full bg-white shadow-lg dark:bg-gray-800" x-show="open"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
        {{ $slot }}
    </nav>

</div>
