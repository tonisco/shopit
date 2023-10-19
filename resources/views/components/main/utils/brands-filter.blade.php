<div class="flex flex-col gap-2 p-4 bg-white border rounded-lg border-gray-300 dark:bg-gray-800">
    <h3 class="text-lg text-gray-800 dark:text-gray-200 font-semibold">Brands</h3>
    @foreach ($brands as $brand)
        @php
            // check if it is part of the query string
            $in_request = request()->get('brands');
            if ($in_request) {
                // turn brand value to array
                $brand_values = explode(',', $in_request);
                $in_array = array_search($brand->name, $brand_values);
            
                // check if it returns key of the brand in the array
                if (gettype($in_array) === 'integer') {
                    array_splice($brand_values, $in_array, 1);
            
                    // check if the array is empty after removing the brand
                    if (count($brand_values) === 0) {
                        $new_brand_value = null;
                    } else {
                        $new_brand_value = join(',', $brand_values);
                    }
                } else {
                    // add new brand to list
                    array_push($brand_values, $brand->name);
                    $new_brand_value = join(',', $brand_values);
                }
            } else {
                $new_brand_value = $brand->name;
            }
            
            if ($new_brand_value) {
                $brand_link = request()->fullUrlWithQuery(['brands' => $new_brand_value, 'page' => null]);
            } else {
                $brand_link = request()->fullUrlWithoutQuery(['brands', 'page']);
            }
        @endphp
        <a class="px-1 flex gap-2 items-center text-sm" href="{{ $brand_link }}">
            <div class="h-4 w-4 items-center border-2 border-brandRed dark:border-brandRed">
                @if ($in_request && gettype($in_array) === 'integer')
                    <x-ri-checkbox-fill class="h-full w-full text-brandRed dark:text-brandRedDark" />
                @endif
            </div>
            <p class="text-gray-800 dark:text-gray-200">{{ $brand->name }}</p>
        </a>
    @endforeach
</div>
