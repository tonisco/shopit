@php
    $breadcrumb = App\Models\BreadcrumbsImage::first();
@endphp

<section id="breadcrumbs" class="w-full py-20 bg-center bg-cover bg-no-repeat"
    style="background-image:linear-gradient(0deg,rgba(0,0,0,0.65), rgba(0,0,0,.65)),url({{ asset($breadcrumb->image) }});">
    <div class="flex flex-col mx-auto max-w-7xl px-4 gap-4">
        <h1 class="text-3xl text-white dark:text-gray-200 capitalize">{{ $heading }}</h1>
        <nav class="w-full rounded-md">
            <ol class="list-reset flex">
                @foreach ($crumbs as $crumb)
                    @if ($loop->last)
                        <li class="text-neutral-500 capitalize dark:text-neutral-400">{{ $crumb['name'] }}</li>
                    @else
                        <li>
                            <a href="{{ $crumb['route'] }}"
                                class="text-primary capitalize transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
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
