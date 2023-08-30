<x-vendor.layout.main page="Orders">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Orders" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'orders']]" />
        </div>

        <div class="w-[92.5vw] overflow-x-auto sm:w-full sm:overflow-x-hidden text-gray-800 dark:text-gray-200">
            <table class="!w-full datatable text-gray-800 dark:text-gray-200">
                <thead>
                    <tr class="font-semibold capitalize">
                        <td class="px-1 py-2 text-xs md:text-sm"> id </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> name </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> date </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> items </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> total </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> status </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> action </td>
                    </tr>
                </thead>
                <tbody class="!px-1 table-body"></tbody>
            </table>

        </div>
    </section>
    @section('script')
        <script>
            $(function() {
                let table = $('.datatable').DataTable({
                    processing: true,
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
                                return `<a href="${data}" class="text-white bg-red-500 hover:bg-red-600 dark:hover:bg-red-800 transition-all dark:bg-red-700 rounded px-4 py-2 text-sm my-2">View order</a>`
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
