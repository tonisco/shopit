<x-vendor.layout.main page="Orders">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Orders" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'orders']]" />
        </div>

        <table style="width: 100%" class="divide-y divide-gray-200 datatable dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr class="text-sm text-left text-gray-500 capitalize dark:text-gray-400">
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

        <div class="check-modal modal" style="display: none">
            <div
                class="content w-[500px] slideIn flex max-h-[85vh] overflow-y-auto flex-col rounded-lg relative gap-4 p-4 bg-white dark:bg-gray-800">
                <div
                    class="flex gap-1.5 justify-between items-center pb-4 border-b-2 text-gray-700 dark:text-gray-400 border-gray-200 dark:border-gray-800">
                    <h3 class="text-lg font-medium capitalize">Order details</h3>
                    <x-ri-close-fill class="h-6 cursor-pointer close-modal" />
                </div>
                <div class="text-sm text-gray-600 capitalize dark:text-gray-400">
                    <p>Order Id: <span class="font-medium text-gray-800 order-id dark:text-gray-200"></span></p>
                    <p>Customer: <span class="font-medium text-gray-800 customer-name dark:text-gray-200"></span></p>
                </div>
                <table class="table-fixed w-[468px]">
                    <thead class="border-b">
                        <tr class="py-2 text-sm text-gray-600 capitalize dark:text-gray-400">
                            <th class="w-20 px-4 py-2 font-normal text-start">Image</th>
                            <th class="px-4 py-2 font-normal text-start">Details</th>
                            <th class="w-20 px-4 py-2 font-normal text-start">price</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-medium text-gray-800 capitalize text-start tbody dark:text-gray-200">
                        <tr class="border-b">
                            <th class="px-4 py-2 text-sm font-medium text-start" colspan="2">sub total</th>
                            <th class="px-4 py-2 text-sm font-medium sub-total text-start">$0</th>
                        </tr>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-sm font-medium text-start" colspan="2">commission</th>
                            <th class="px-4 py-2 text-sm font-medium commission text-start">$0</th>
                        </tr>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-sm font-medium text-start" colspan="2">total</th>
                            <th class="px-4 py-2 text-sm font-medium total text-start">$0</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @section('script')
        <script>
            let modal = $('.check-modal')
            let modalContent = $('.content')

            function closeModal() {
                $('body').removeAttr('style')
                modalContent.removeClass('slideIn')
                modalContent.addClass('slideOut')

                setTimeout(() => {
                    modal.hide()
                    $('.details').remove()
                    modalContent.removeClass('slideOut')
                    modalContent.addClass('slideIn')
                }, 300);
            }

            modal.on('click', function(e) {
                e.stopPropagation()
                closeModal()
            })

            $('.close-modal').on('click', function(e) {
                e.stopPropagation()
                closeModal()
            })

            function returnOrderDetails(name, price, qty, sub_total, image_url, variant) {
                return `<tr class="border-b details">
							<th class="px-4 py-2 text-sm font-normal text-start">
								<img src="{{ asset('') }}${image_url}" class="object-cover w-12 h-full" alt="${name}">
							</th>
							<th class="flex flex-col justify-center gap-1 px-4 py-2 text-xs font-normal text-start">
								<h3 class="text-sm font-medium truncate">${name}</h3>
								<p>$${price} x ${qty}</p>
								<p>${variant??''}</p>
							</th>
							<th class="px-4 py-2 text-sm font-medium sub-total text-start">$${sub_total}</th>
						</tr>`
            }

            function openModal(data) {
                let {
                    id,
                    order_products,
                    sum,
                    user: {
                        first_name,
                        last_name
                    }
                } = data

                $('.order-id').text(id)
                $('.customer-name').text(`${first_name} ${last_name}`)

                let details = order_products.map(product => {
                    let {
                        product_name,
                        product_image,
                        price,
                        qty,
                        total,
                        variants
                    } = product
                    return returnOrderDetails(product_name, price, qty, total, product_image, variants)
                });

                $('.tbody').prepend(details.join(''))
                $('.sub-total').text(sum)
                $('.total').text(sum)

                modal.show()
            }

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
                            searchable: false,
                            sortable: false,
                            render: function(data, _, row) {
                                return `<div class="inline-block px-3 py-2 my-2 text-sm text-white transition-all bg-red-500 rounded cursor-pointer show-order hover:bg-red-600 dark:hover:bg-red-800 dark:bg-red-700">View order</div>`
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

                }).on('click', 'tbody .show-order', function(e) {
                    let parent = $(this).parent()[0]
                    let data = table.row(parent).data()
                    openModal(data)
                })
            })
        </script>
    @endsection
</x-vendor.layout.main>
