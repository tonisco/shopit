<div x-cloak x-show="open" class="flex flex-col gap-4">
    <h2 class="font-medium text-gray-800 capitalize dark:text-gray-200">Variant Option</h2>

    <div class="flex flex-col w-full gap-2">
        <x-general.input.input name="variant_name" id="variant_name" label="Variant Name" ::required="open"
            value="{{ old('variant_name') }}" />
        @error('variant_name')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>


    @if (!old('option_name_1'))
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
    @else
        @php
            $index = 1;
        @endphp

        @while (old('option_name_' . $index))
            <div class="flex flex-col gap-4 @if ($index === 1) variant-option @endif">
                <div class="flex items-center justify-between gap-4 heading">
                    <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option
                        {{ $index }}
                    </h3>
                    @if ($index !== 1)
                        <i
                            class="text-red-500 cursor-pointer h-7 bi bi-trash-fill w-7 delete-icon dark:text-red-700"></i>
                    @endif
                </div>
                <div class="flex flex-col w-full gap-4 sm:flex-row">
                    <div class="flex flex-col w-full gap-2">
                        <x-general.input.input class="option_name" name="option_name_{{ $index }}"
                            id="option_name_{{ $index }}" label="Name" ::required="open"
                            value="{{ old('option_name_' . $index) }}" />
                        @error('option_name_*')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-2">
                        <x-general.input.input class="option_price" ::required="open"
                            name="option_price_{{ $index }}" id="option_price_{{ $index }}" type="number"
                            label="Price $" value="{{ old('option_price_' . $index) }}" />
                        <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to
                            the original
                            product price</p>
                        @error('option_price_*')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-2">
                        <x-general.input.input class="option_qty" name="option_qty_{{ $index }}"
                            id="option_qty_{{ $index }}" label="Qty" ::required="open" type="number"
                            value="{{ old('option_qty_' . $index) }}" />
                        @error('option_qty_*')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                </div>
            </div>

            @php
                $index++;
            @endphp
        @endwhile
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

        function deleteItem() {
            let parent = $(this).parent().parent()
            let gran = parent.parent()

            parent.remove()

            let index = -1

            gran.children().each(function() {
                let item = $(this)

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

        $('.delete-icon').on('click', deleteItem)
    </script>
@endpush
