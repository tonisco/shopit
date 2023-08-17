<x-vendor.layout.main page="Products Variants">
    <section class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        <x-vendor.layout.heading title="Edit Variant" :crumbs="[
            ['name' => 'products', 'route' => route('vendor.products.index')],
            ['name' => 'variant', 'route' => route('vendor.products.variants.index', $productId)],
            ['name' => 'edit'],
        ]" />

        <form method="POST"
            action="{{ route('vendor.products.variants.update', ['product' => $productId, 'variant' => $productVariant->id]) }}"
            class="flex flex-col gap-8">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
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
            </div>

            <div class="flex flex-col gap-4 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant Options</h2>
                @foreach ($productVariant->productVariantItems as $productVariantItem)
                    @if ($loop->first)
                        <form></form>
                    @endif
                    <form
                        @if (!$loop->first) action="{{ route('vendor.products.variants.items.destroy', ['product' => $productId, 'variant' => $productVariant->id, 'item' => $productVariantItem->id]) }}" @endif
                        class="flex flex-col gap-4 @if ($loop->first) variant-option @else delete-form @endif">
                        <div class="flex justify-between gap-4 items-center heading">
                            <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option
                                {{ $loop->index + 1 }}
                            </h3>
                            @if (!$loop->first)
                                <a data-name="{{ $productVariantItem->name }}" class="cursor-pointer delete-option">
                                    <i class="h-7 bi bi-trash-fill w-7 text-red-500 dark:text-red-700"></i>
                                </a>
                            @endif
                        </div>
                        <div class="w-full flex-col sm:flex-row flex gap-4">
                            <div class="flex flex-col w-full gap-2">
                                <x-general.input.input class="option-name" name="option-name-1" id="option-name-1"
                                    label="Name" required value="{{ $productVariantItem->name }}" />
                                @error('option-name-1')
                                    <x-general.input.input-error :messages="$message" />
                                @enderror
                            </div>
                            <div class="flex flex-col w-full gap-2">
                                <x-general.input.input class="option-price" required name="option-price-1"
                                    id="option-price-1" type="number" label="Price $"
                                    value="{{ $productVariantItem->price }}" />
                                <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to
                                    the original
                                    product price</p>
                                @error('option-price-1')
                                    <x-general.input.input-error :messages="$message" />
                                @enderror
                            </div>
                        </div>
                    </form>
                @endforeach

                <button id="increase" type="button" class="text-end text-red-500 dark:text-red-700 capitalize">add
                    option</button>
            </div>
        </form>
    </section>

    <x-general.utils.delete-modal itemName=" variant option" />

    @section('script')
        <script>
            function addAttributes(title, nameInput, priceInput, index) {
                nameInput.attr('id', `option-name-${index}`)
                nameInput.attr('name', `option-name-${index}`)

                priceInput.attr('id', `option-price-${index}`)
                priceInput.attr('name', `option-price-${index}`)

                title.text(`Option ${index}`)
            }

            function deleteItem() {
                let parent = $(this).parent().parent()
                let gran = parent.parent()

                parent.remove()

                let index = 0

                gran.children().each(function() {
                    let item = $(this)

                    let title = item.find('h3')
                    let nameInput = item.find('.option-name')
                    let priceInput = item.find('.option-price')

                    if (title && nameInput && priceInput) {
                        addAttributes(title, nameInput, priceInput, index)
                        index++
                    }
                })
            }

            $('#increase').on('click', function() {
                $(this).hide()
                let parent = $(this).parent()
                let newItem = parent.find('.variant-option').clone()
                let index = parent.children().length - 1

                let title = newItem.find('h3')
                let nameInput = newItem.find('.option-name')
                let priceInput = newItem.find('.option-price')
                newItem.find('.delete-option').remove()
                newItem.find('.heading').append(
                    '<i class="h-7 bi bi-trash-fill w-7 delete-icon cursor-pointer text-red-500 dark:text-red-700" ></i>'
                )
                addAttributes(title, nameInput, priceInput, index)

                nameInput.val('')
                priceInput.val(0)

                newItem.removeClass('variant-option')
                newItem.insertBefore(this)

                newItem.find('.delete-icon').on('click', deleteItem)
                $(this).fadeIn()
            })

            let modal = $('.delete-modal')

            $('.delete-option').on('click', function() {
                let name = this.dataset.name

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
        </script>
    @endsection
</x-vendor.layout.main>
