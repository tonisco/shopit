<div class="flex flex-col gap-1">
    <div class="flex flex-wrap gap-1">
        @foreach ($crumbs as $crumb)
            @if (!$loop->first)
                <p class="text-sm text-brandGrayDark capitalize dark:text-brandGray">/</p>
            @endif
            @if (!$loop->last)
                <a href="{{ $crumb['route'] }}"
                    class="text-sm text-brandGrayDark capitalize transition hover:text-brandDark active:text-brandDark dark:text-brandGray hover:dark:text-brandLight dark:active:text-brandLight">{{ $crumb['name'] }}</a>
            @else
                <a class="text-sm text-brandGray capitalize dark:text-brandGrayDark">{{ $crumb['name'] }}</a>
            @endif
        @endforeach
    </div>
    <h1 class="font-medium w-full block text-brandDark capitalize text-[1.7rem] dark:text-brandLight">
        {{ $title }}
    </h1>
    @isset($subtitle)
        <h1 class="text-base text-brandDark capitalize truncate dark:text-brandLight">{!! $subtitle !!}
        </h1>
    @endisset
</div>
