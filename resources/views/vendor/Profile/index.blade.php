<x-vendor.layout.main page="Profile">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Profile" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'profile']]" />
        </div>

        <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" x-data="selected('profile')">
            <div class="flex gap-x-2 flex-wrap gap-y-4">
                <button class="tab-button tab-button-default" @click="setItemSelected('profile')"
                    :class="itemSelected === 'profile' ? 'tab-button-selected' :
                        'tab-button-not-selected'">Edit
                    Profile</button>

                <button class="tab-button" @click="setItemSelected('withdrawal method')"
                    :class="itemSelected === 'withdrawal method' ? 'tab-button-selected' :
                        'tab-button-not-selected'">Withdrawal
                    Method</button>

                <button class="tab-button" @click="setItemSelected('others')"
                    :class="itemSelected === 'others' ? 'tab-button-selected' :
                        'tab-button-not-selected'">Others</button>
            </div>

            @include('vendor.Profile.partials._profile-form')

            @include('vendor.Profile.partials._withdrawal-form')

            @include('vendor.Profile.partials._others')
        </div>

    </section>

</x-vendor.layout.main>
