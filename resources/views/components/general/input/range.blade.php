<div class="relative" x-data="range({{ $min }}, {{ $max }})" x-init="minTrigger();
maxTrigger()">
    <div>
        <input type="range" step="100" min="{{ $min }}" max="{{ $max }}" x-on:input="minTrigger"
            x-model="minPrice"
            class="absolute z-20 w-full h-2 opacity-0 appearance-none cursor-pointer pointer-events-none">
        <input type="range" step="100" min="{{ $min }}" max="{{ $max }}" x-on:input="maxTrigger"
            x-model="maxPrice"
            class="absolute z-20 w-full h-2 opacity-0 appearance-none cursor-pointer pointer-events-none">
        <div class="relative z-10 h-2">
            <div class="absolute top-0 bottom-0 left-0 right-0 z-10 bg-gray-200 rounded-md"></div>
            <div class="absolute top-0 bottom-0 z-20 bg-red-200 rounded-md"
                x-bind:style="'right:' + maxThumb + '%; left:' + minThumb + '%'"></div>
            <div class="absolute top-0 left-0 z-30 w-4 h-4 -mt-1 bg-red-400 rounded-full cursor-grab"
                x-bind:style="'left:' + minThumb + '%'"></div>
            <div class="absolute top-0 right-0 z-30 w-4 h-4 -mt-1 bg-red-400 rounded-full cursor-grab"
                x-bind:style="'right: ' + maxThumb + '%'"></div>
        </div>
    </div>

    <div class="flex justify-between w-full mt-5">
        <input type="text" maxlength="6" x-on:input="minTrigger" x-model.number="minPrice"
            class="w-[72px] text-sm rounded-lg focus:outline-none border-gray-200 focus:border-brandRed focus:ring-brandRed"
            name='minPrice' id="minPrice">
        <input type="text" maxlength="6" x-on:input="maxTrigger" x-model.number="maxPrice"
            class="w-[72px] text-sm rounded-lg focus:outline-none border-gray-200 focus:border-brandRed focus:ring-brandRed"
            name='maxPrice' id="maxPrice">
    </div>
</div>
