<x-vendor.layout.main page="Products">
    <section class="flex flex-col flex-1 gap-6 px-4 py-4">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <h1 class="text-3xl text-gray-800 dark:text-gray-200">Products</h1>
            <a href="{{ route('vendor.products.create') }}"
                class="px-3 py-2 text-white bg-red-500 rounded shadow dark:bg-red-700 hover:bg-red-600">Add Product</a>
        </div>
        <div class="w-[90vw] overflow-x-auto sm:w-full sm:overflow-hidden text-gray-800 dark:text-gray-200">
            <table class="!w-full datatable text-gray-800 dark:text-gray-200">
                <thead>
                    <tr class="font-semibold capitalize">
                        <td class="px-1 py-2 text-sm md:text-base"> id </td>
                        <td class="px-1 py-2 text-sm md:text-base"> image </td>
                        <td class="px-1 py-2 text-sm md:text-base"> name </td>
                        <td class="px-1 py-2 text-sm md:text-base"> price </td>
                        <td class="px-1 py-2 text-sm md:text-base"> discount </td>
                        <td class="px-1 py-2 text-sm md:text-base"> status </td>
                        <td class="px-1 py-2 text-sm md:text-base"> approved </td>
                        <td class="px-1 py-2 text-sm md:text-base"> action </td>
                    </tr>
                </thead>
                <tbody class="!px-1 table-body"></tbody>
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
                <h3 class="check-heading">Are you sure you want to </h3>
                <h2 class="font-semibold capitalize check-name"></h2>
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
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
                    ajax: "{{ route('vendor.products.index') }}",
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'price'
                        },
                        {
                            data: 'discount'
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
											${val.status &&'checked'}
										/>`
                            }
                        },
                        {
                            data: 'approved',
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false,
                        },
                    ],
                    drawCallback: function() {
                        $('.deleteButton').on('click', function() {
                            let {
                                name,
                                route
                            } = this.dataset

                            $('.delete-name').text(name)
                            $('.delete-form').attr('action', route)
                            modal.show()

                            $('.delete-item').on('click', function() {
                                this.submit()
                            })
                        })
                        $('.status').on('click', function(e) {
                            console.log(e.target.checked)
                            let {
                                name,
                                id
                            } = this.dataset

                            console.log(name)
                            if (e.target.checked) {
                                $('.check-heading').append(' show')
                                $('.check-button').text('Show')
                            } else {
                                $('.check-heading').append(' hide')
                                $('.check-button').text('Hide')
                            }

                            $('.check-name').text(name)
                            $('.check-form').attr('action', `/vendor/products/${id}/status`)
                            checkmodal.show()

                            e.target.checked = !e.target.checked

                            $('.check-item').on('click', function() {
                                this.submit()
                            })
                        })
                    }

                })
            })
        </script>
    @endsection

</x-vendor.layout.main>
