@php
    $old = old('status') === 'active';
    $status = isset($product->status) ? $product->status : $old;
@endphp

<div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Published</h2>
    <div class="flex flex-col w-full gap-2">
        <select required data-te-select-init data-te-select-size="lg" name="status" id="status">
            <option @if ($status) selected @endif value="active">Active
            </option>
            <option @if (!$status) selected @endif value="inactive">Inactive
            </option>
        </select>
        <label data-te-select-label-ref for="status">
            status
        </label>
        @error('status')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>

</div>
