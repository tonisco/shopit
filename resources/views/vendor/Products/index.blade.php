<x-vendor.layout.main page="Products">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Products" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'products']]" />
            <a href="{{ route('vendor.products.create') }}"
                class="px-3 py-2 text-sm text-white bg-red-500 rounded shadow sm:text-base dark:bg-red-700 hover:bg-red-600">Create
                Product</a>
        </div>

        <div>
            <table style="width: 100%" class="datatable divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr class="text-sm text-left capitalize text-gray-500 dark:text-gray-300">
                        <td class="py-3.5 px-4 font-normal"> id </td>
                        <td class="py-3.5 px-4 font-normal"> image </td>
                        <td class="py-3.5 px-4 font-normal"> name </td>
                        <td class="py-3.5 px-4 font-normal"> price </td>
                        <td class="py-3.5 px-4 font-normal"> Rating </td>
                        <td class="py-3.5 px-4 font-normal"> discount </td>
                        <td class="py-3.5 px-4 font-normal"> status </td>
                        <td class="py-3.5 px-4 font-normal"> approved </td>
                        <td class="py-3.5 px-4 font-normal"> updated </td>
                        <td class="py-3.5 px-4 font-normal"> action </td>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900 table-body">
                </tbody>
            </table>

        </div>
    </section>

    <div class="trash-table-modal modal" style="display: none">
        <div class="trash-table-modal-content modal-content">
            <h2 class="text-xl text-gray-800 dark:text-gray-200">Are you sure you want to delete <span
                    class="font-semibold capitalize delete-name"></span></h2>
            <p class="text-sm text-gray-800 dark:text-gray-200">This will delete all variants and images
                that have been added</p>
            <div class="flex items-center self-end gap-2">
                <button
                    class="px-3 py-2 bg-gray-200 shadow-md delete-cancel-button dark:bg-gray-900 dark:text-gray-200">Cancel</button>
                <form action="" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-2 text-white bg-red-500 rounded shadow-md dark:bg-red-700 delete-item"
                        type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <div class="check-modal modal" style="display: none">
        <div class="check-modal-content modal-content">
            <div class="flex gap-1.5 text-xl text-gray-800 dark:text-gray-200">
                <h3 class="check-heading"></h3>
            </div>
            <p class="text-sm text-gray-800 dark:text-gray-200">This item won't be visible to customers</p>
            <div class="flex items-center self-end gap-2">
                <button
                    class="px-3 py-2 bg-gray-200 shadow-md check-cancel-button dark:bg-gray-900 dark:text-gray-200">Cancel</button>
                <form action="" method="POST" class="check-form">
                    @csrf
                    @method('PUT')
                    <button
                        class="px-3 py-2 text-white bg-red-500 rounded shadow-md check-button dark:bg-red-700 check-item"
                        type="submit"></button>
                </form>
            </div>
        </div>
    </div>


    @section('script')
        <script type="text/javascript">
            let modal = $('.trash-table-modal')
            let checkmodal = $('.check-modal')

            modal.on('click', function(e) {
                e.stopPropagation()
                modal.hide()
                $('body').removeAttr('style')
            })

            $('.trash-table-modal-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.delete-cancel-button').on('click', function(e) {
                modal.hide()
                $('body').removeAttr('style')
            })

            checkmodal.on('click', function(e) {
                e.stopPropagation()
                checkmodal.hide()
                $('body').removeAttr('style')
            })

            $('.check-modal-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.check-cancel-button').on('click', function(e) {
                checkmodal.hide()
                $('body').removeAttr('style')
            })

            $(function() {
                let table = $('.datatable').DataTable({
                    processing: true,
                    serverside: true,
                    order: [
                        [9, 'desc']
                    ],
                    ajax: "{{ route('vendor.products.index') }}",
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'image',
                            orderable: false,
                            searchable: false,
                            render(data, type, row) {
                                return `<img src='${data}' alt='${row.name}' class='table-image'>`
                            }
                        },
                        {
                            data: 'name',
                            render: function(data) {
                                return data.length < 19 ?
                                    data :
                                    data.substr(0, 18) + '&#8230;';
                            }
                        },
                        {
                            data: 'price',
                            render: DataTable.render.number(null, null, null, '$')
                        },
                        {
                            data: 'product_reviews_avg_rating',
                            render: DataTable.render.number(null, null, 1, )
                        },
                        {
                            // TODO:check if discount is workin correctly
                            data: 'discount',
                        },
                        {
                            data: 'status',
                            searchable: false,
                            render(_, _d, val) {
                                console.log(val.product_reviews_avg_rating)
                                return `<label class="switch status" data-id="${val.id}" data-name="${val.name}">
											<input type="checkbox" ${val.status &&'checked'}>
											<span class="slider"></span>
										</label>`
                            }
                        },
                        {
                            data: 'approved',
                            searchable: false,
                        },
                        {
                            data: 'updated_at',
                            searchable: false,
                            render: DataTable.render.datetime('Do MMM YYYY'),
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false,
                            render(data, type, row) {
                                return `<div class="flex items-center gap-1.5">
									<a href='${data.show}' class='bg-green-500 action-button dark:bg-green-700'>
										<i class='action-button-icon bi bi-eye'></i>
									</a>
									<a href='${data.edit}' class='bg-blue-500 action-button dark:bg-blue-700'>
										<i class='action-button-icon bi bi-pencil-square'></i>
									</a>
										<a class="bg-red-500 action-button dark:bg-red-700 deleteButton"
										data-id="${row.id}" data-name="${row.name}" data-route="${data.delete}">
											<i class="action-button-icon bi bi-trash"></i>
										</a>
									</div`
                                //  TODO: MIGHT NOT NEED IT
                                // <div x-data="toggler" class="relative">
                                // 	<a @click="toggle" class="action-button bg-zinc-700">
                                // 		<i class="action-button-icon bi bi-three-dots-vertical"></i>
                                // 	</a>
                                // 	<div @click.outside="toggle" x-show="open" class="product-options">
                                // 		<a href="${data.variant}" class="product-options-item">Variants</a>
                                // 	</div>
                                // </div>
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

                        $('.deleteButton').on('click', function() {
                            let {
                                name,
                                route
                            } = this.dataset

                            $('.delete-name').text(name)
                            let deleteForm = $('.delete-form')
                            deleteForm.attr('action', route)
                            modal.show()
                            $('body').css('overflow', 'hidden')

                            $('.delete-item').on('click', function() {
                                deleteForm.submit()
                            })
                        })
                        $('.status').on('click', function(e) {
                            let {
                                name,
                                id
                            } = this.dataset

                            if (e.target.checked) {
                                let message = `Are you sure you want to show
                								<span class="font-semibold capitalize">${name}</span>`
                                $('.check-heading').html(message)
                                $('.check-button').text('Show')
                            } else {
                                let message = `Are you sure you want to hide
                								<span class="font-semibold capitalize">${name}</span>`
                                $('.check-heading').html(message)
                                $('.check-button').text('Hide')
                            }

                            let checkForm = $('.check-form')
                            checkForm.attr('action', `/vendor/products/${id}/status`)
                            checkmodal.show()
                            $('body').css('overflow', 'hidden')

                            e.target.checked = !e.target.checked

                            $('.check-item').on('click', function() {
                                checkForm.submit()
                            })
                        })
                    }

                })
            })
        </script>
    @endsection

</x-vendor.layout.main>
