<x-vendor.layout.main page="Dashboard">
    <section class="flex flex-col flex-1 gap-6 px-4 py-4">
        @php
            $p = request()->query('p');
        @endphp
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <h1 class="text-3xl text-brandDark dark:text-brandLight">Dashboard</h1>
            <form method="GET" action="{{ route('vendor.dashboard') }}">
                <select name="p" id="p" value=""
                    class="dark:bg-brandDark dark:text-white focus:border-brandRed focus:ring-brandRed dark:focus:border-brandRedDark dark:focus:ring-brandRedDark"
                    onchange="if(event.target.value !=='{{ $p }}')this.closest('form').submit()">
                    <option value="all">All time</option>
                    <option @if ($p === 'today') selected @endif value="today">Today</option>
                    <option @if ($p === 'last_7_days') selected @endif value="last_7_days">Last 7 Days
                    </option>
                    <option @if ($p === 'last_30_days') selected @endif value="last_30_days">Last 30 Days
                    </option>
                    <option @if ($p === 'last_12_months') selected @endif value="last_12_months">Last 12 Months
                    </option>
                </select>
            </form>

        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">Total orders</p>
                    <h2 class="text-3xl text-brandDark dark:text-white">{{ $currentOrders }}</h2>
                </div>
                <x-bi-clipboard2 class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">completed orders</p>
                    <h2 class="text-3xl text-brandDark dark:text-white">{{ $completedOrder }}</h2>
                </div>
                <x-bi-clipboard2-check class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">pending orders</p>
                    <h2 class="text-3xl text-brandDark dark:text-white">{{ $pendingOrder }}</h2>
                </div>
                <x-ri-timer-line class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">products ordered</p>
                    <h2 class="text-3xl text-brandDark dark:text-white">{{ $productOrdered }}</h2>
                </div>
                <x-bi-cart class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">completed products
                        order
                    </p>
                    <h2 class="text-3xl text-brandDark dark:text-white">{{ $completedProductOrdered }}</h2>
                </div>
                <x-bi-cart-check class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">pending Products order
                    </p>
                    <h2 class="text-3xl text-brandDark dark:text-white">{{ $pendingProductOrdered }}</h2>
                </div>
                <x-ri-timer-line class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>

            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">Total Earnings</p>
                    <h2 class="text-3xl text-brandDark dark:text-white">${{ number_format($earnings) }}</h2>
                </div>
                <x-ri-money-dollar-circle-line class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">pending earnings</p>
                    <h2 class="text-3xl text-brandDark dark:text-white">${{ number_format($pendingEarnings) }}</h2>
                </div>
                <x-ri-hand-coin-line class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
            <div
                class="flex items-center justify-between w-full max-w-sm p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <div class="flex flex-col gap-2">
                    <p class="text-sm font-medium text-brandDarker uppercase dark:text-white/80">customers</p>
                    <h2 class="text-3xl text-brandDark dark:text-white">{{ $customers }}</h2>
                </div>
                <x-ri-user-line class="w-12 h-12 text-brandGrayDark dark:text-white" />
            </div>
        </div>
        <div class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
            <h1 class="text-xl text-brandDarker dark:text-white/80">Earnings</h1>
            <canvas id="myChart" class="!max-w-[100%] overflow-hidden !max-h-[450px]"></canvas>
        </div>
        <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
            <div class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <h1 class="text-xl text-brandDarker dark:text-white/80">Top Selling Product</h1>
                <div class="flex flex-col gap-4">
                    @if (count($mostSold) === 0)
                        <p class="text-base text-center text-brandGrayDark my-28 dark:text-white/60 sm:text-xl">No data
                        </p>
                    @else
                        @foreach ($mostSold as $item)
                            <div class="flex items-center w-full gap-2">
                                <img src="{{ asset($item->image) }}" class="object-cover w-10 h-14">
                                <p class="flex-1 text-brandGrayDark truncate text-md dark:text-white">
                                    {{ $item->name }}
                                </p>
                                <p class="text-brandGrayDark dark:text-white/60">{{ $item->order_products_sum_qty }}
                                    times
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-md dark:bg-brandDark">
                <h1 class="text-xl text-brandDarker dark:text-white/80">Lowest Product Quantity</h1>
                <div class="flex flex-col gap-4">
                    @if (count($lowestQuantities) === 0)
                        <p class="text-base text-center text-brandGrayDark my-28 dark:text-white/60 sm:text-xl">No data
                        </p>
                    @else
                        @foreach ($lowestQuantities as $lowestQuantity)
                            <div class="flex items-center w-full gap-2">
                                <img src="{{ asset($lowestQuantity->image) }}" class="object-cover w-10 h-14">
                                <p class="flex-1 text-brandGrayDark truncate text-md dark:text-white">
                                    {{ $lowestQuantity->name }}</p>
                                <p class="text-brandGrayDark dark:text-white/60">{{ $lowestQuantity->qty }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
            integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            let earnings = @json($graphEarnings)

            const ctx = document.getElementById('myChart').getContext('2d');

            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Object.keys(earnings).map(key => key),
                    datasets: [{
                        label: 'Earnings',
                        data: Object.values(earnings).map(value => value),
                        fill: false,
                        borderColor: 'rgb(239 68 68)',
                        pointBackgroundColor: 'rgb(239 68 68)',
                        pointBorderColor: 'rgb(239 68 68)',
                        pointHoverBackgroundColor: 'rgb(239 68 68)',
                        tension: 0.2,
                        pointBorderWidth: 1,

                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            displayColors: false,
                        },
                        legend: {
                            display: false
                        },
                    }
                }
            })
        </script>
    @endsection
</x-vendor.layout.main>
