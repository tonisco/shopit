<div x-cloak x-show="itemSelected === 'others'" class="flex flex-col gap-8">

    <div>
        <x-general.utils.button text="Delete Account" type="button" class="deleteButton" />
    </div>

    <x-general.utils.delete-modal item="your vendor account"
        subtitle="This process is irreversable and will delete all your products"
        route="{{ route('vendor.account.delete') }}" />
</div>
