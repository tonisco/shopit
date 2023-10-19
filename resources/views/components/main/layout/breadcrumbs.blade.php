@php
    $breadcrumb = App\Models\BreadcrumbsImage::first();
@endphp

<section id="breadcrumbs" class="w-full py-20 bg-center bg-no-repeat bg-cover"
    style="background-image:linear-gradient(0deg,rgba(0,0,0,0.65), rgba(0,0,0,.65)),url({{ asset($breadcrumb->image) }});">
    <div class="flex flex-col gap-4 px-4 mx-auto max-w-7xl">
        <h1 class="text-3xl text-white capitalize dark:text-brandLight">{{ $heading }}</h1>
        <nav class="w-full rounded-md">
            <ol class="flex list-reset">
                @foreach ($crumbs as $crumb)
                    @if ($loop->last)
                        <li class="capitalize text-neutral-500 dark:text-neutral-400">{{ $crumb['name'] }}</li>
                    @else
                        <li>
                            <a href="{{ $crumb['route'] }}"
                                class="capitalize transition duration-150 ease-in-out text-primary hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                                {{ $crumb['name'] }}</a>
                        </li>
                        <li>
                            <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>

    </div>

</section>
