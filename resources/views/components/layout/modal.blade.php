{{-- data-te-toggle="modal" data-te-target="#{{ $id }}" data-te-ripple-init data-te-ripple-color="light" --}}
<div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-hidden outline-none"
    id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}" aria-modal="true" role="dialog">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative flex h-full w-full justify-center items-center opacity-0 transition-all duration-300 ease-in-out">
        <div
            class="pointer-events-auto p-6 relative max-h-[75%] overflow-y-auto {{ $width ?? 'w-[85%] md:w-[80%] lg:w-[65%]' }} gap-6 flex flex-col rounded-md border-none bg-white dark:bg-gray-800 bg-clip-padding text-current shadow-lg outline-none">

            <button type="button"
                class="box-content bg-red-500 dark:bg-red-700 self-end rounded-lg p-1 border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                data-te-modal-dismiss aria-label="Close">
                <x-ri-close-fill class="h-6 w-6 text-white" />
            </button>

            <div class="relative">
                {{ $slot }}
            </div>

        </div>
    </div>
</div>
