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

                <button class="tab-button" @click="setItemSelected('change password')"
                    :class="itemSelected === 'change password' ? 'tab-button-selected' :
                        'tab-button-not-selected'">Change
                    Password</button>

                <button class="tab-button" @click="setItemSelected('withdrawal method')"
                    :class="itemSelected === 'withdrawal method' ? 'tab-button-selected' :
                        'tab-button-not-selected'">Withdrawal
                    Method</button>
            </div>

            @include('vendor.Profile.partials._profile-form')

            @include('vendor.Profile.partials._change-password-form')

            @include('vendor.Profile.partials._withdrawal-form')
        </div>

    </section>

</x-vendor.layout.main>
