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

            <div class="flex flex-col gap-4 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant Options</h2>
                @foreach ($productVariant->productVariantItems as $productVariantItem)
                    <div class="flex flex-col gap-4 variant-option delete-form">
                        <div class="flex justify-between gap-4 items-center heading">
                            <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option
                                {{ $loop->index + 1 }}
                            </h3>
                            <div class="flex gap-2 items-center">
                                <a data-name="{{ $productVariantItem->name }}"
                                    data-price="{{ $productVariantItem->price }}" class="cursor-pointer edit-option"
                                    data-link="{{ route('vendor.products.variants.items.destroy', ['product' => $productId, 'variant' => $productVariant->id, 'item' => $productVariantItem->id]) }}">
                                    <i class="h-8 text-lg bi bi-pencil-square w-8 text-blue-500 dark:text-blue-700"></i>
                                </a>
                                @if (!$loop->first)
                                    <a data-name="{{ $productVariantItem->name }}" class="cursor-pointer delete-option">
                                        <i class="h-8 text-lg bi bi-trash-fill w-8 text-red-500 dark:text-red-700"></i>
                                    </a>
                                @endif

                            </div>
                        </div>
                        <div class="w-full flex-col sm:flex-row flex gap-4 sm:gap-6">
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
                        </div>
                    </div>
                @endforeach

                <button id="increase" type="button" class="text-end text-red-500 dark:text-red-700 capitalize">add
                    option</button>
            </div>
        </div>
    </section>

    <x-general.utils.delete-modal itemName=" variant option" />

    <div style="display: none"
        class="edit-modal fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-end bg-black/25">
        <form
            class="bg-white edit-content dark:bg-gray-800 h-full p-8 pt-12 flex translate-x-full flex-col gap-6 transition-all duration-300">
            <h1 class="text-xl font-medium text-gray-800 capitalize dark:text-gray-200">Create Variant Option</h1>
            <div class="flex flex-col w-full gap-2">
                <x-general.input.input class="edit-name" name="name" id="name" label="Name" required />
                @error('name')
                    <x-general.input.input-error :messages="$message" />
                @enderror
            </div>
            <div class="flex flex-col w-full gap-2">
                <x-general.input.input class="edit-price" required name="price" id="price" type="number"
                    label="Price $" />
                <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added
                    to
                    the original
                    product price</p>
                @error('price')
                    <x-general.input.input-error :messages="$message" />
                @enderror
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
            let modal = $('.delete-modal')

            $('.delete-option').on('click', function() {
                let name = this.dataset.name

                $('.delete-name').text(name)

                let deleteLink = $(this).parent().parent().attr('action')

                modal.show()

                $('.delete-item').on('click', function() {
                    $.ajax({
                        url: deleteLink,
                        method: 'DELETE',
                        success: function(data) {
                            // {{-- blade-formatter-disable --}}
							let alert = `{{ <x-general.utils.toast message='Variant option has successfully been deleted' title='Variant option' type='success' /> }}`
							// {{-- blade-formatter-enable --}}
                            $('body').prepend(alert)

                        },
                        error: function(xhr, status, error) {
                            // {{-- blade-formatter-disable --}}
							let alert = `{{<x-general.utils.toast message='Failed to delete variant option' title='Variant option' type='success' />}}`
                            // {{-- blade-formatter-enable --}}
                            $('body').prepend(alert)
                            console.log(error);
                        }
                    })
                })
            })

            let editModal = $('.edit-modal')

            let closeEditModal = function() {
                editModal.children().addClass('translate-x-full')
                setTimeout(() => {
                    editModal.hide()
                }, 400);
            }

            editModal.on('click', closeEditModal)

            $('.edit-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.edit-cancel').on('click', closeEditModal)

            $('.edit-option').on('click', function() {
                let {
                    name,
                    price,
                    link
                } = this.dataset

                editModal.find('.edit-name').val(name)
                editModal.find('.edit-price').val(price)

                editModal.find('h1').text('Edit Product Variant')

                editModal.show()
                editModal.children().removeClass('translate-x-full')

                editModal.find('form').on('submit', async function(e) {
                    e.preventDefault()
                    let newName = editModal.find('.edit-name').val(name)
                    let newPrice = editModal.find('.edit-price').val(price)
                    await $.ajax({
                        url: link,
                        method: 'PUT',
                        body: {
                            name: newName,
                            price: newPrice
                        },
                        success: function(data) {
                            // {{-- blade-formatter-disable --}}
							let alert = `{{ <x-general.utils.toast message='Variant option has successfully been updated' title='Variant option' type='success' /> }}`
							// {{-- blade-formatter-enable --}}
                            $('body').prepend(alert)

                        },
                        error: function(xhr, status, error) {
                            // {{-- blade-formatter-disable --}}
							let alert = `{{<x-general.utils.toast message='Failed to update variant option' title='Variant option' type='success' />}}`
                            // {{-- blade-formatter-enable --}}
                            $('body').prepend(alert)
                            console.log(error);
                        }
                    })

                    closeEditModal()
                })

            })

            $('#increase').on('click', function() {
                editModal.find('.edit-name').val('')
                editModal.find('.edit-price').val(0)

                editModal.find('h1').text('Create Product Variant')

                editModal.show()
                editModal.children().removeClass('translate-x-full')

                editModal.find('form').on('submit', function(e) {
                    e.preventDefault()
                    let newName = editModal.find('.edit-name').val(name)
                    let newPrice = editModal.find('.edit-price').val(price)

                    $.ajax({
                        url: "{{ route('vendor.products.variants.items.store', ['product' => $productId, 'variant' => $productVariant->id]) }}",
                        method: 'POST',
                        body: {
                            name: newName,
                            price: newPrice
                        },
                        success: function(data) {
                            // {{-- blade-formatter-disable --}}
							let alert = `{{ <x-general.utils.toast message='Variant option has successfully been created' title='Variant option' type='success' /> }}`
							// {{-- blade-formatter-enable --}}
                            $('body').prepend(alert)

                        },
                        error: function(xhr, status, error) {
                            // {{-- blade-formatter-disable --}}
							let alert = `{{<x-general.utils.toast message='Failed to create variant option' title='Variant option' type='success' />}}`
                            // {{-- blade-formatter-enable --}}
                            $('body').prepend(alert)
                            console.log(error);
                        }
                    })
                })
            })
        </script>
    @endsection
</x-vendor.layout.main>
