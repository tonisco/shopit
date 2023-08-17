<div role="alert" x-data="timeout" x-show="show" x-init="countdown(true)" x-transition:leave="translate-x-[110%]"
    class="fixed right-6 top-5 z-[999999] transition-all ease-in-out max-w-[80%] sm:max-w-md mx-auto p-4 bg-white border border-gray-100 shadow-xl rounded-xl dark:border-gray-800 dark:bg-gray-900">
    <div class="flex items-start gap-2 sm:gap-4">
        @if ($type === 'success')
            <span class="text-green-600">
                <x-ri-checkbox-circle-line class="w-6 h-6" />
            </span>
        @elseif ($type === 'error')
            <span class="text-red-600">
                <x-ri-error-warning-fill class="w-6 h-6" />
            </span>
        @else
            <span class="text-yellow-600">
                <x-ri-information-fill class="w-6 h-6" />
            </span>
        @endif

        <div class="flex-1">
            <p class="block text-sm font-semibold text-gray-900 sm:text-base dark:text-white">
                {{ $title }}
            </p>

            <p class="mt-1 text-xs text-gray-700 sm:text-sm dark:text-gray-200">
                {{ $message }}
            </p>
        </div>

        <button @click="close(true)"
            class="text-gray-500 transition hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-500">
            <x-ri-close-fill class="w-6 h-6" />
        </button>
    </div>
    @php
        if ($type === 'success') {
            $bg = 'bg-green-600';
        } elseif ($type === 'error') {
            $bg = 'bg-red-600';
        } else {
            $bg = 'bg-yellow-600';
        }
    @endphp
    <div class="absolute left-0 h-1 transition-[right] ease-linear duration-1000 -bottom-[2px] rounded-xl {{ $bg }}"
        x-bind:style="'right:' + (5 - time) * 20 + '%;'"></div>
</div>
