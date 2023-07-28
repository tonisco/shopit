<x-vendor.layout.main page="Products">
    <section class="flex flex-col flex-1 gap-6 px-4 py-4">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <h1 class="text-3xl text-gray-800 dark:text-gray-200">Products</h1>
            <a href="{{ route('vendor.product.create') }}"
                class="px-3 py-2 text-white bg-red-500 rounded shadow dark:bg-red-700 hover:bg-red-600">Add Product</a>
        </div>
        <div class="w-full" x-data="deleteItem">
            <table class="w-full datatable">
                <thead>
                    <tr>
                        <td> id </td>
                        <td> image </td>
                        <td> name </td>
                        <td> price </td>
                        <td> discount </td>
                        <td> approved </td>
                        <td> action </td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </section>

    <div class="trash-table-modal" style="display: none">
        <div class="trash-table-modal-content">
            <i class="absolute w-5 h-5 bi bi-x top-2 right-2"></i>
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


    @section('script')
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            let modal = $('.trash-table-modal')

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

            $(function() {
                let table = $('.datatable').DataTable({
                    processing: true,
                    serverside: true,
                    ajax: "{{ route('vendor.product.index') }}",
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
                            data: 'approved'
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

                            console.log(route)

                            $('.delete-name').text(name)
                            $('.delete-form').attr('action', route)
                            modal.show()

                            $('.delete-item').on('click', function() {
                                this.submit()
                            })
                        })
                    }

                })
            })
        </script>
    @endsection

</x-vendor.layout.main>
