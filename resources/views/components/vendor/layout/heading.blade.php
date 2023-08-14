<div class="flex flex-col gap-1">
    <div class="flex flex-wrap gap-1">
        @foreach ($crumbs as $crumb)
            @if (!$loop->first)
                <p class="text-sm text-gray-500 capitalize dark:text-gray-400">/</p>
            @endif
            @if (!$loop->last)
                <a href="{{ $crumb['route'] }}"
                    class="text-sm text-gray-500 capitalize transition hover:text-gray-700 active:text-gray-700 dark:text-gray-400 hover:dark:text-gray-300 dark:active:text-gray-300">{{ $crumb['name'] }}</a>
            @else
                <a class="text-sm text-gray-400 capitalize dark:text-gray-500">{{ $crumb['name'] }}</a>
            @endif
        @endforeach
    </div>
    <h1 class="font-medium w-full block text-gray-800 capitalize text-[1.7rem] dark:text-gray-200">
        {{ $title }}
    </h1>
    @isset($subtitle)
        <h1 class="text-base text-gray-800 capitalize truncate dark:text-gray-200">{!! $subtitle !!}
        </h1>
    @endisset
</div>
