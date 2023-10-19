<div>
    <a id="theme-switcher"
        class="hidden text-sm font-normal text-brandLight transition duration-200 bg-transparent cursor-pointer dark:block whitespace-nowrap focus:bg-brandLight hover:text-brandDark hover:ease-in-out motion-reduce:transition-none dark:hover:text-brandDark focus:outline-none active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-brandGray dark:text-brandLight dark focus:dark:bg-brandGrayDark"
        data-theme="light">
        <div class="pointer-events-none">
            <div class="inline-block text-center" data-theme-icon="light">
                <x-ri-sun-line class="w-6 h-6 text-brandLight" />
            </div>
        </div>
    </a>

    <a id="theme-switcher"
        class="block text-sm font-normal text-brandLight transition duration-200 bg-transparent cursor-pointer dark:hidden whitespace-nowrap focus:bg-brandLight hover:text-brandDark hover:ease-in-out motion-reduce:transition-none dark:hover:text-brandDark focus:outline-none active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-brandGray dark:text-brandLight dark focus:dark:bg-brandGrayDark"
        data-theme="dark" data-te-dropdown-item-ref>
        <div class="pointer-events-none">
            <div class="inline-block text-center" data-theme-icon="dark">
                <x-ri-moon-line class="w-6 h-6 " />
            </div>
        </div>
    </a>
</div>
