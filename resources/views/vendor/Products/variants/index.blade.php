<x-vendor.layout.main page="Products Variants">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="{{ $product->name }} Variants" :crumbs="[
                ['name' => 'dashboard', 'route' => route('vendor.dashboard')],
                ['name' => 'products', 'route' => route('vendor.products.index')],
                ['name' => 'variant'],
            ]" />
            <a href="{{ route('vendor.products.variants.create', $product->id) }}"
                class="px-3 py-2 text-sm text-white bg-red-500 rounded shadow sm:text-base dark:bg-red-700 hover:bg-red-600">Create
                Variant</a>
        </div>
        <div class="w-[92.5vw] overflow-x-auto sm:w-full sm:overflow-x-hidden text-gray-800 dark:text-gray-200">
            <table class="!w-full datatable text-gray-800 dark:text-gray-200">
                <thead>
                    <tr class="font-semibold capitalize">
                        <td class="px-1 py-2 text-xs md:text-sm"> id </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> name </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> status </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> updated </td>
                        <td class="px-1 py-2 text-xs md:text-sm"> action </td>
                    </tr>
                </thead>
                <tbody class="!px-1 table-body"></tbody>
            </table>

        </div>
    </section>

    <div class="trash-table-modal modal" style="display: none">
        <div class="trash-table-modal-content modal-content">
            <h2 class="text-xl text-gray-800 dark:text-gray-200">Are you sure you want to delete <span
                    class="font-semibold capitalize delete-name"></span> variant</h2>
            <p class="text-sm text-gray-800 dark:text-gray-200">This will delete all variants items
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
            })

            $('.trash-table-modal-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.delete-cancel-button').on('click', function(e) {
                modal.hide()
            })

            checkmodal.on('click', function(e) {
                e.stopPropagation()
                checkmodal.hide()
            })

            $('.check-modal-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.check-cancel-button').on('click', function(e) {
                checkmodal.hide()
            })

            $(function() {
                let table = $('.datatable').DataTable({
                    processing: true,
                    serverside: true,
                    order: [
                        [4, 'desc']
                    ],
                    ajax: {
                        url: "{{ route('vendor.products.variants.index', $product->id) }}"
                    },
                    columns: [{
                            data: 'id'
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
                            data: 'status',
                            render(_, _d, val) {
                                return `<input
                		class="mr-2 mt-[0.3rem] status h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca]"
                					type="checkbox"
                					role="switch"
                					data-name="${val.name}"
                					data-id="${val.id}"
									data-product_id="${val.product_id}"
                					${val.status &&'checked'}
                				/>`
                            }
                        },
                        {
                            data: 'updated_at',
                            render: DataTable.render.date(),
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false,
                            render(data, type, row) {
                                return `<div class="flex items-center gap-1.5">
                        	<a href='${data.edit}' class='bg-blue-500 action-button dark:bg-blue-700'>
                        		<i class='action-button-icon bi bi-pencil-square'></i>
                        	</a>
                        	<div>
                        		<a class="bg-red-500 action-button dark:bg-red-700 deleteButton"
                        		data-id="${row.id}" data-name="${row.name}" data-route="${data.delete}">
                        			<i class="action-button-icon bi bi-trash"></i>
                        		</a>
                        	</div>
                        </div`
                            }
                        },
                    ],
                    drawCallback: function(settings, ) {
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

                            console.log(route, 'route')

                            $('.delete-name').text(name)

                            let deleteForm = $('.delete-form')

                            deleteForm.attr('action', route)
                            modal.show()

                            $('.delete-item').on('click', function() {
                                deleteForm.submit()
                            })
                        })
                        $('.status').on('click', function(e) {
                            let {
                                name,
                                id,
                                product_id
                            } = this.dataset

                            if (e.target.checked) {
                                let message = `Are you sure you want to show
								 <span class="font-semibold capitalize">${name}</span> variant`
                                $('.check-heading').text(message)
                                $('.check-button').text('Show')
                            } else {
                                let message = `Are you sure you want to hide
								 <span class="font-semibold capitalize">${name}</span> variant`
                                $('.check-heading').html(message)
                                $('.check-button').text('Hide')
                            }

                            let checkForm = $('.check-form')
                            checkForm.attr('action',
                                `/vendor/products/${product_id}/variants/${id}/status`)
                            checkmodal.show()

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
