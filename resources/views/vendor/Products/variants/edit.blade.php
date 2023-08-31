<x-vendor.layout.main page="Products Variants">
    <section class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        <x-vendor.layout.heading title="Edit Variant" :crumbs="[
            ['name' => 'products', 'route' => route('vendor.products.index')],
            ['name' => 'variant', 'route' => route('vendor.products.variants.index', $productId)],
            ['name' => 'edit'],
        ]" />

        <div class="flex flex-col gap-8">
            <form method="POST"
                action="{{ route('vendor.products.variants.update', ['product' => $productId, 'variant' => $productVariant->id]) }}"
                class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant</h2>

                <div class="flex flex-col w-full gap-2">
                    <div class="relative" data-te-input-wrapper-init>
                        <input required type="text"name="name" id="name" placeholder="Name"
                            class="form-input peer" value="{{ $productVariant->name }}">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    @error('name')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>

                <div class="flex flex-col w-full gap-2">
                    <select required data-te-select-init data-te-select-size="lg" name="status" id="status">
                        <option @if ($productVariant->status) selected @endif value="active">Active</option>
                        <option @if (!$productVariant->status) selected @endif value="inactive">Inactive</option>
                    </select>
                    <label data-te-select-label-ref for="status">
                        status
                    </label>
                    @error('status')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
                <div class="self-end">
                    <x-general.input.submit-button text="update" />
                </div>
            </form>

            <div class="flex flex-col gap-4 p-6 pb-8 bg-white rounded-lg shadow-md parent dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant Options</h2>
                @foreach ($productVariant->productVariantItems as $productVariantItem)
                    <div class="flex flex-col gap-4 @if ($loop->first) variant-option @endif">
                        <div class="flex items-center justify-between gap-4 heading">
                            <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option
                                {{ $loop->index + 1 }}
                            </h3>
                            <div class="flex items-center gap-2 data-item" data-name="{{ $productVariantItem->name }}"
                                data-price="{{ $productVariantItem->price }}" data-qty="{{ $productVariantItem->qty }}"
                                data-link="{{ route('vendor.products.variants.items.destroy', ['product' => $productId, 'variant' => $productVariant->id, 'item' => $productVariantItem->id]) }}"
                                data-deletelink="{{ route('vendor.products.variants.items.destroy', ['product' => $productId, 'variant' => $productVariant->id, 'item' => $productVariantItem->id]) }}">
                                <a class="cursor-pointer edit-option">
                                    <i class="w-8 h-8 text-lg text-blue-500 bi bi-pencil-square dark:text-blue-700"></i>
                                </a>
                                @if (!$loop->first)
                                    <a class="cursor-pointer delete-option">
                                        <i class="w-8 h-8 text-lg text-red-500 bi bi-trash-fill dark:text-red-700"></i>
                                    </a>
                                @endif

                            </div>
                        </div>
                        <div class="flex flex-col w-full gap-4 sm:flex-row sm:gap-6">
                            <div class="flex flex-col w-full gap-2">
                                <x-general.input.input class="option-name" id="option-name-1" label="Name" readonly
                                    value="{{ $productVariantItem->name }}" />
                            </div>
                            <div class="flex flex-col w-full gap-2">
                                <x-general.input.input class="option-price" id="option-price-1" readonly type="number"
                                    label="Price $" value="{{ $productVariantItem->price }}" />
                                <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added
                                    to
                                    the original
                                    product price</p>
                            </div>
                            <div class="flex flex-col w-full gap-2">
                                <x-general.input.input class="option-qty" id="option-qty-1" label="Qty" readonly
                                    value="{{ $productVariantItem->qty }}" />
                            </div>
                        </div>
                    </div>
                @endforeach

                <button id="increase" type="button" class="text-red-500 capitalize text-end dark:text-red-700">add
                    option</button>
            </div>
        </div>
    </section>

    <x-general.utils.delete-modal itemName=" variant option" />

    <div style="display: none"
        class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-end edit-modal bg-black/25">
        <form
            class="flex flex-col h-full gap-6 p-8 pt-12 transition-all duration-300 translate-x-full bg-white edit-content dark:bg-gray-800">
            <h1 class="text-xl font-medium text-gray-800 capitalize dark:text-gray-200">Create Variant Option</h1>
            <div class="flex flex-col w-full gap-2">
                <x-general.input.input class="edit-name" name="name" id="name" label="Name" required />
            </div>
            <div class="flex flex-col w-full gap-2">
                <x-general.input.input class="edit-price" required name="price" id="price" type="number"
                    label="Price $" />
                <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added
                    to
                    the original
                    product price</p>
            </div>
            <div class="flex flex-col w-full gap-2">
                <x-general.input.input class="edit-qty" required name="qty" id="qty" type="number"
                    label="Qty" />
            </div>
            <div class="flex gap-4">
                <button class="px-3 py-2 text-white bg-red-500 rounded shadow-md dark:bg-red-700 edit-item"
                    type="submit">Create</button>
                <button type="reset"
                    class="px-3 py-2 bg-gray-200 shadow-md edit-cancel dark:bg-gray-900 dark:text-gray-200">Cancel</button>
            </div>
        </form>
    </div>

    @section('script')
        <script>
            function showAlert(type, message, title) {
                let alerts

                if (type === 'error') {
                    alerts = `<x-general.utils.toast message='${message}' title='${title}' type='error' />`

                } else {
                    alerts = `<x-general.utils.toast message='${message}' title='${title}' type='success' /> `
                }

                $('body').prepend(alerts)
            }

            function addAttributes(title, nameInput, priceInput, index) {
                nameInput.attr('id', `option-name-${index}`)
                nameInput.attr('name', `option-name-${index}`)

                priceInput.attr('id', `option-price-${index}`)
                priceInput.attr('name', `option-price-${index}`)

                title.text(`Option ${index}`)
            }

            function deleteItem() {
                let ele = $(this)
                let {
                    name,
                    deletelink
                } = ele.parent()[0].dataset

                $('.delete-name').text(name)

                modal.show()

                $('.delete-item').on('click', async function(e) {
                    e.preventDefault()
                    await $.ajax({
                        url: deletelink,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            showAlert('success', 'Variant option has successfully been deleted',
                                'Variant option')

                            ele.parent().parent().parent().remove()

                            $('.heading').find('h3').each(function(index) {
                                $(this).text(`Option ${index+1}`)
                            })
                            modal.hide()
                        },
                        error: function(xhr, status, error) {
                            showAlert('error', 'Failed to delete variant option', error)
                        }
                    })

                })
            }

            function addItem(name, price, qty, link, deletelink) {
                let newItem = $('.variant-option').clone()
                let index = $('.parent').children().length - 1

                newItem.find('h3').text(`Option ${index}`)
                newItem.find('.option-name').val(name)
                newItem.find('.option-price').val(price)
                newItem.find('.option-qty').val(qty)

                let editButton = $(
                    '<a class="cursor-pointer delete-option"><i class="w-8 h-8 text-lg text-red-500 bi bi-trash-fill dark:text-red-700"></i></a>'
                ).get(0)

                newItem.find('.heading').children()[1].append(editButton)

                let dataItem = newItem.find('.data-item')
                dataItem.attr('data-name', name)
                dataItem.attr('data-price', price)
                dataItem.attr('data-link', link)
                dataItem.attr('data-deletelink', deletelink)

                newItem.find('.edit-option').on('click', editItem)

                newItem.removeClass('variant-option')
                newItem.insertBefore($('#increase'))

                newItem.find('.delete-option').on('click', deleteItem)
                $(this).fadeIn()
            }

            function editItem() {
                let ele = $(this)
                let {
                    name,
                    price,
                    qty,
                    link
                } = ele.parent()[0].dataset

                let button = $('.edit-item')
                button.text('Update')
                editModal.find('.edit-name').val(name)
                editModal.find('.edit-price').val(price)
                editModal.find('.edit-qty').val(qty)

                editModal.find('h1').text('Edit Product Variant')

                editModal.show()
                editModal.children().removeClass('translate-x-full')

                editModal.find('form').on('submit', async function(e) {
                    e.preventDefault()
                    let newName = editModal.find('.edit-name').val()
                    let newPrice = editModal.find('.edit-price').val()
                    let newQty = editModal.find('.edit-qty').val()
                    await $.ajax({
                        url: link,
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            name: newName,
                            price: newPrice,
                            qty: newQty,
                        },
                        success: function(data) {
                            showAlert('success', 'Variant option has successfully been updated',
                                'Variant option')

                            let gran = ele.parent().parent().parent()

                            gran.find('.option-name').val(newName)
                            gran.find('.option-price').val(newPrice)
                            gran.find('.option-qty').val(newQty)

                            closeEditModal()
                        },
                        error: function(xhr, status, error) {
                            showAlert('error', $error, 'Variant option')

                            closeEditModal()
                        }
                    })

                    closeEditModal()
                })

            }

            let modal = $('.delete-modal')

            $('.delete-option').on('click', deleteItem)

            let editModal = $('.edit-modal')

            function closeEditModal() {
                editModal.children().addClass('translate-x-full')
                editModal.find('form').off('submit')
                setTimeout(() => {
                    editModal.hide()
                }, 400);
            }

            editModal.on('click', closeEditModal)

            $('.edit-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.edit-cancel').on('click', closeEditModal)

            $('.edit-option').on('click', editItem)

            $('#increase').on('click', function() {
                let button = $('.edit-item')
                button.text('Create')

                editModal.find('.edit-name').val('')
                editModal.find('.edit-price').val(0)
                editModal.find('.edit-qty').val(0)

                editModal.find('h1').text('Create Product Variant')

                editModal.show()
                editModal.children().removeClass('translate-x-full')

                // TODO: add validation and loading state

                editModal.find('form').on('submit', function(e) {
                    e.preventDefault()
                    let newName = editModal.find('.edit-name').val()
                    let newPrice = editModal.find('.edit-price').val()
                    let newQty = editModal.find('.edit-qty').val()

                    $.ajax({
                        url: "{{ route('vendor.products.variants.items.store', ['product' => $productId, 'variant' => $productVariant->id]) }}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            name: newName,
                            price: newPrice,
                            qty: newQty,
                        },
                        success: function(data) {
                            showAlert('success', 'Variant option has successfully been created',
                                'Variant option')

                            closeEditModal()
                            let {
                                item,
                                link,
                                deletelink
                            } = data
                            addItem(item.name, item.price, item.qty, link, deletelink)
                        },
                        error: function(xhr, status, error) {
                            showAlert('error', 'Failed to create variant option', error)

                            closeEditModal()
                        }
                    })
                })
            })
        </script>
    @endsection
</x-vendor.layout.main>
