<form x-show="itemSelected === 'profile'" class="flex flex-col gap-8" method="POST" enctype="multipart/form-data"
    action="{{ route('vendor.profile.update') }}">
    @method('PUT')
    @csrf

    <div class="flex flex-col gap-2">
        <div class="flex gap-4 items-start sm:items-center sm:flex-row flex-col">
            <img src="{{ asset($vendor->image) }}" alt="{{ $vendor->name }}" class="h-52 w-48 object-cover rounded">

            <div class="flex flex-col items-center text-brandDark dark:text-brandLight capitalize text-sm">
                <p>Or </p>
                <p>change Image</p>
            </div>

            <div class="h-52 w-48">
                <x-general.input.image name="image" id="image" />
            </div>

            @error('image')
                <x-general.input.input-error :messages="$message" />
            @enderror
        </div>

    </div>
    <x-general.input.input label="Name" id="name" name="name" required value="{{ $vendor->name }}" />

    <x-general.input.input label="Email" id="email" name="email" type="email" required
        value="{{ $vendor->email }}" />

    <x-general.input.input label="Address" id="address" name="address" required value="{{ $vendor->address }}" />

    <x-general.input.input label="Phone" id="phone" name="phone" required value="{{ $vendor->phone }}" />

    <x-general.input.textarea label="Store Description" id="description" name="description" required
        value="{{ $vendor->description }}" />

    <x-general.input.input label="Facebook" id="fb_link" name="fb_link" value="{{ $vendor->fb_link }}" />

    <x-general.input.input label="Twitter" id="tw_link" name="tw_link" value="{{ $vendor->tw_link }}" />

    <x-general.input.input label="Instagram" id="insta_link" name="insta_link" value="{{ $vendor->insta_link }}" />

    <div>
        <x-general.utils.button text="Save" type="submit" />
    </div>
</form>
