<x-vendor.layout.main page="Orders">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Orders" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'orders']]" />
        </div>

        <div>
            <table style="width: 100%" class="datatable divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr class="text-sm text-left capitalize text-gray-500 dark:text-gray-400">
                        <th class="py-3.5 px-4 font-normal"> id </th>
                        <th class="py-3.5 px-4 font-normal"> name </th>
                        <th class="py-3.5 px-4 font-normal"> date </th>
                        <th class="py-3.5 px-4 font-normal"> items </th>
                        <th class="py-3.5 px-4 font-normal"> total </th>
                        <th class="py-3.5 px-4 font-normal"> status </th>
                        <th class="py-3.5 px-4 font-normal"> action </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900 table-body">
                </tbody>
            </table>

        </div>
    </section>
    @section('script')
        <script>
            $(function() {
                let table = $('.datatable').DataTable({
                    processing: true,
                    stripeClasses: [],
                    serverside: true,
                    ajax: "{{ route('vendor.orders.index') }}",
                    columns: [{
                            data: 'id'
                        },
                        {
                            name: 'name',
                            render: function(data, status, row) {
                                return row.user.last_name + ' ' + row.user.first_name
                            }
                        },
                        {
                            data: 'created_at',
                            render: DataTable.render.datetime('Do MMM YYYY')
                        },
                        {
                            data: 'items'
                        },
                        {
                            data: 'sum'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'action',
                            render: function(data) {
                                return `<a href="${data}" class="text-white bg-red-500 hover:bg-red-600 dark:hover:bg-red-800 transition-all dark:bg-red-700 rounded px-3 py-2 text-sm my-2">View order</a>`
                            }
                        },
                    ],
                    drawCallback: function(settings) {
                        // removes pagination if there is no extra page
                        if (settings._iDisplayLength > settings.fnRecordsDisplay()) {
                            $(settings.nTableWrapper).find('.dataTables_paginate').hide();
                        } else {
                            $(settings.nTableWrapper).find('.dataTables_paginate').show();
                        }
                    }

                })
            })
        </script>
    @endsection
</x-vendor.layout.main>
