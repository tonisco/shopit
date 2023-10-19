<div role="alert" x-data="timeout" x-show="show" x-init="countdown(true)" x-transition:leave="translate-x-[110%]"
    class="fixed right-6 top-5 z-[999999] transition-all ease-in-out max-w-[80%] sm:max-w-md mx-auto p-4 bg-white border border-brandLighter shadow-xl rounded-xl dark:border-brandDark dark:bg-brandDarker">
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
            <p class="block text-sm font-semibold text-brandDarker sm:text-base dark:text-white">
                {{ $title }}
            </p>

            <p class="mt-1 text-xs text-brandDark sm:text-sm dark:text-brandLight">
                {{ $message }}
            </p>
        </div>

        <button @click="close(true)"
            class="text-brandGrayDark transition hover:text-brandGrayDark dark:text-brandGray dark:hover:text-brandGrayDark">
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
