<x-vendor.layout.main page="Products">
    <section class="flex flex-col flex-1 gap-6 px-4 py-8">
        <div class="flex flex-col items-start justify-between w-full gap-2 sm:flex-row sm:items-center">
            <x-vendor.layout.heading title="Products" :crumbs="[['name' => 'dashboard', 'route' => route('vendor.dashboard')], ['name' => 'products']]" />
            <a href="{{ route('vendor.products.create') }}"
                class="px-3 py-2 text-sm text-white bg-brandRed rounded shadow sm:text-base dark:bg-brandRedDark hover:bg-red-600">Create
                Product</a>
        </div>

        <div>
            <table style="width: 100%" class="divide-y divide-brandLight datatable dark:divide-brandDark">
                <thead class="bg-gray-50 dark:bg-brandDark">
                    <tr class="text-sm text-left text-brandGrayDark capitalize dark:text-brandLight">
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
                <tbody class="bg-white divide-y divide-brandLight dark:divide-brandDark dark:bg-brandDarker table-body">
                </tbody>
            </table>

        </div>
    </section>

    <div class="check-modal modal" style="display: none">
        <div class="check-modal-content modal-content slideIn">
            <div class="flex gap-1.5 text-xl text-brandDark dark:text-brandLight">
                <h3 class="check-heading"></h3>
            </div>
            <p class="text-sm text-brandDark dark:text-brandLight">This item won't be visible to customers</p>
            <div class="flex items-center self-end gap-2">
                <button
                    class="px-3 py-2 bg-brandLight shadow-md check-cancel-button dark:bg-brandDarker dark:text-brandLight">Cancel</button>
                <form action="" method="POST" class="check-form">
                    @csrf
                    @method('PUT')
                    <button
                        class="px-3 py-2 text-white bg-brandRed rounded shadow-md check-button dark:bg-brandRedDark check-item"
                        type="submit"></button>
                </form>
            </div>
        </div>
    </div>

    <x-general.utils.delete-modal item="your vendor account"
        subtitle="This will delete all variants and images that have been added" />


    @section('script')
        <script type="text/javascript">
            let modal = $('.delete-modal')
            let checkmodal = $('.check-modal')

            function closeModal() {
                $('body').removeAttr('style')
                let modalContent = $('.delete-modal-content')
                let checkmodalContent = $('.check-modal-content')
                modalContent.removeClass('slideIn')
                modalContent.addClass('slideOut')

                checkmodalContent.removeClass('slideIn')
                checkmodalContent.addClass('slideOut')

                setTimeout(() => {
                    modal.hide()
                    checkmodal.hide()

                    checkmodalContent.removeClass('slideOut')
                    checkmodalContent.addClass('slideIn')
                    modalContent.removeClass('slideOut')
                    modalContent.addClass('slideIn')

                }, 300);
            }

            modal.on('click', function(e) {
                e.stopPropagation()
                closeModal()
            })

            function openDeleteModal() {
                modal.show()
                $('body').css('overflow', 'hidden')

                $('.delete-item').on('click', function() {
                    deleteForm.submit()
                })
            }

            $('.delete-modal-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.delete-cancel-button').on('click', closeModal)

            checkmodal.on('click', function(e) {
                e.stopPropagation()
                closeModal()
            })

            $('.check-modal-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.check-cancel-button').on('click', closeModal)

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
									<a href='${data.reviews}' class='bg-green-500 action-button dark:bg-green-700'>
										<i class='action-button-icon bi bi-chat-square-dots'></i>
									</a>
									<a href='${data.edit}' class='bg-brandBlue action-button dark:bg-brandBlueDark'>
										<i class='action-button-icon bi bi-pencil-square'></i>
									</a>
										<a class="bg-brandRed action-button dark:bg-brandRedDark deleteItem">
											<i class="action-button-icon bi bi-trash"></i>
										</a>
									</div`
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

                }).on('click', 'tbody .deleteItem', function() {
                    let parent = $(this).parent().parent()
                    let data = table.row(parent).data()

                    $('.delete-name').text(data.name)
                    $('.delete-form').attr('action', data.action.delete)
                    openDeleteModal()

                }).on('click', 'tbody .status', function(e) {
                    e.preventDefault();
                    let parent = $(this).parent()
                    let data = table.row(parent).data()

                    let {
                        name,
                        id
                    } = data

                    if (!data.status) {
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

                    $('.check-item').on('click', function() {
                        checkForm.submit()
                    })

                })
            })
        </script>
    @endsection

</x-vendor.layout.main>
