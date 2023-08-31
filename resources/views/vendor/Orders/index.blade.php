<x-vendor.layout.main page="Orders">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Orders" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'orders']]" />
        </div>

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

        <div class="check-modal modal" style="display: none">
            <div
                class="content w-[500px] slideIn flex max-h-[85vh] overflow-y-auto flex-col rounded-lg relative gap-4 p-4 bg-white dark:bg-gray-800">
                <div
                    class="flex gap-1.5 justify-between items-center pb-4 border-b-2 text-gray-700 dark:text-gray-400 border-gray-200 dark:border-gray-800">
                    <h3 class="text-lg font-medium capitalize">Order details</h3>
                    <x-ri-close-fill class="h-6 close-modal cursor-pointer" />
                </div>
                <div class="text-gray-600 dark:text-gray-400 capitalize text-sm">
                    <p>Order Id: <span class="order-id font-medium text-gray-800 dark:text-gray-200"></span></p>
                    <p>Customer: <span class="customer-name font-medium text-gray-800 dark:text-gray-200"></span></p>
                </div>
                <table class="table-fixed w-[468px]">
                    <thead class="border-b">
                        <tr class="text-sm py-2 capitalize text-gray-600 dark:text-gray-400">
                            <th class="py-2 px-4 font-normal text-start w-20">Image</th>
                            <th class="py-2 px-4 font-normal text-start">Details</th>
                            <th class="py-2 px-4 font-normal text-start w-20">price</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-start tbody capitalize text-gray-800 dark:text-gray-200 font-medium">
                        <tr class="border-b">
                            <th class="py-2 text-sm font-medium px-4 text-start" colspan="2">sub total</th>
                            <th class="sub-total py-2 text-sm font-medium px-4 text-start">$0</th>
                        </tr>
                        <tr class="border-b">
                            <th class="py-2 text-sm font-medium px-4 text-start" colspan="2">commission</th>
                            <th class="commission py-2 text-sm font-medium px-4 text-start">$0</th>
                        </tr>
                        <tr class="border-b">
                            <th class="py-2 text-sm font-medium px-4 text-start" colspan="2">total</th>
                            <th class="total py-2 text-sm font-medium px-4 text-start">$0</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @section('script')
        <script>
            $(function() {
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
								<th class="py-2 text-sm px-4 font-normal text-start">
									<img src="{{ asset('') }}${image_url}" class="h-full w-12 object-cover" alt="${name}">
								</th>
								<th class="py-2 flex text-xs flex-col justify-center gap-1 px-4 font-normal text-start">
									<h3 class="text-sm font-medium truncate">${name}</h3>
									<p>$${price} x ${qty}</p>
									<p>${variant??''}</p>
								</th>
								<th class="sub-total py-2 text-sm font-medium px-4 text-start">$${sub_total}</th>
							</tr>`
                }

                function openModal(e) {
                    let {
                        id,
                        order_products,
                        sum,
                        user: {
                            first_name,
                            last_name
                        }
                    } = e.data

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
                            render: function(data, _, row) {
                                let button =
                                    `<div class="text-white show-order-${row.id} inline-block cursor-pointer bg-red-500 hover:bg-red-600 dark:hover:bg-red-800 transition-all dark:bg-red-700 rounded px-3 py-2 text-sm my-2">View order</div>`
                                $(`.show-order-${row.id}`).on('click', row, openModal)

                                return button
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
