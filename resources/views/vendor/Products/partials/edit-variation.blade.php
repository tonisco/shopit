<div x-cloak x-show="open" class="flex flex-col gap-4">
    <h2 class="font-medium text-gray-800 capitalize dark:text-gray-200">Variant Option</h2>

    @if (count($product->productVariants))
        @foreach ($product->productVariants as $productVariant)
            <div class="flex flex-col w-full gap-2">
                <x-general.input.input name="variant_name" id="variant_name" label="Variant Name" ::required="open"
                    value="{{ isset($productVariant->name) ? $productVariant->name : old('variant_name') }}" />
                @error('variant_name')
                    <x-general.input.input-error :messages="$message" />
                @enderror
            </div>

            @foreach ($productVariant->productVariantItems as $productVariantItem)
                <div class="flex flex-col gap-4 @if ($loop->first === 1) variant-option @endif">
                    <div class="flex items-center justify-between gap-4 heading">
                        <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option
                            {{ $loop->index }}
                        </h3>
                        @if (!$loop->first)
                            <a class="delete-item" data-id="{{ $productVariantItem->id }}">
                                <i class="text-red-500 cursor-pointer h-7 bi bi-trash-fill w-7 dark:text-red-700"></i>
                            </a>
                        @endif
                    </div>
                    <div class="flex flex-col w-full gap-4 sm:flex-row">
                        <div class="flex flex-col w-full gap-2">
                            <x-general.input.input class="option_name" name="{{ 'option_name_' . $loop->index }}"
                                id="{{ 'option_name_' . $loop->index }}" label="Name" ::required="open"
                                value="{{ isset($productVariantItem->name) ? $productVariantItem->name : '' }}" />
                            @error('option_name_*')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="flex flex-col w-full gap-2">
                            <x-general.input.input class="option_price" ::required="open"
                                name="{{ 'option_price_' . $loop->index }}" id="{{ 'option_price_' . $loop->index }}"
                                type="number" label="Price $"
                                value="{{ isset($productVariantItem->price) ? $productVariantItem->price : '0' }}" />
                            <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to
                                the original
                                product price</p>
                            @error('option_price_*')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

                        <div class="flex flex-col w-full gap-2">
                            <x-general.input.input class="option_qty" name="{{ 'option_qty_' . $loop->index }}"
                                id="{{ 'option_qty_' . $loop->index }}" label="Qty" ::required="open" type="number"
                                value="{{ isset($productVariantItem->qty) ? $productVariantItem->qty : '' }}" />
                            @error('option_qty_*')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>

                    </div>
                </div>
            @endforeach
        @endforeach
    @else
        <div class="flex flex-col gap-4 variant-option">
            <div class="flex items-center justify-between gap-4 heading">
                <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option 1
                </h3>
            </div>
            <div class="flex flex-col w-full gap-4 sm:flex-row">
                <div class="flex flex-col w-full gap-2">
                    <x-general.input.input class="option_name" name="option_name_1" id="option_name_1" label="Name"
                        ::required="open" />
                    @error('option_name_*')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
                <div class="flex flex-col w-full gap-2">
                    <x-general.input.input class="option_price" ::required="open" name="option_price_1"
                        id="option_price_1" type="number" label="Price $" value="0" />
                    <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to
                        the original
                        product price</p>
                    @error('option_price_*')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
                <div class="flex flex-col w-full gap-2">
                    <x-general.input.input class="option_qty" name="option_qty_1" id="option_qty_1" label="Qty"
                        ::required="open" type="number" />
                    @error('option_qty_*')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
            </div>
        </div>
    @endif

    <button id="increase" type="button" class="text-red-500 capitalize text-end dark:text-red-700">add
        option</button>
</div>

@push('scripts')
    <script>
        function addAttributes(title, nameInput, priceInput, qtyInput, index) {
            nameInput.attr('id', `option_name_${index}`)
            nameInput.attr('name', `option_name_${index}`)

            priceInput.attr('id', `option_price_${index}`)
            priceInput.attr('name', `option_price_${index}`)

            qtyInput.attr('id', `option_qty_${index}`)
            qtyInput.attr('name', `option_qty_${index}`)

            title.text(`Option ${index}`)
        }

        function reIndex(gran) {
            gran.children().each(function() {
                let item = $(this)

                let index = -1

                let title = item.find('h3')
                let nameInput = item.find('.option_name')
                let priceInput = item.find('.option_price')
                let qtyInput = item.find('.option_qty')

                if (title && nameInput && priceInput && qtyInput) {
                    addAttributes(title, nameInput, priceInput, qtyInput, index)
                    index++
                }
            })
        }

        function deleteItem() {
            let parent = $(this).parent().parent()
            let gran = parent.parent()

            parent.remove()

            reIndex(gran)
        }


        $('#increase').on('click', function() {
            $(this).hide()
            let parent = $(this).parent()
            let newItem = parent.find('.variant-option').clone()
            let index = parent.children().length - 2

            let title = newItem.find('h3')

            let nameInput = newItem.find('.option_name')
            let priceInput = newItem.find('.option_price')
            let qtyInput = newItem.find('.option_qty')

            newItem.find('.heading').append(
                '<i class="text-red-500 cursor-pointer h-7 bi bi-trash-fill w-7 delete-icon dark:text-red-700" ></i>'
            )

            addAttributes(title, nameInput, priceInput, qtyInput, index)

            nameInput.val('')
            priceInput.val(0)
            qtyInput.val('')

            newItem.removeClass('variant-option')
            newItem.insertBefore(this)

            newItem.find('.delete-icon').on('click', deleteItem)
            $(this).fadeIn()
        })

        function deleteVariantItem() {
            let elem = $(this)
            let parent = elem.parent().parent()
            let gran = parent.parent()

            let {
                id
            } = elem.dataset

            let deleteInput = $("input[name='delete-variant-items']")

            if (deleteInput) {
                let oldVal = deleteInput.val()
                deleteInput.val(`${oldVal}_${id}`)
            } else {
                let input = `<input name="delete-variant-items" value="${id}"/>`
                $('#inventory-form').append(input)
            }

            parent.remove()

            reIndex(gran)
        }

        $('.delete-icon').on('click', deleteItem)
        $('.delete-item').on('click', deleteVariantItem)
    </script>
@endpush
