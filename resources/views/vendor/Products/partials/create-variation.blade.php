<div class="flex flex-col gap-4">
    <h2 class="font-medium text-gray-800 capitalize dark:text-gray-200">Variant Option</h2>

    <div class="flex flex-col w-full gap-2">
        <x-general.input.input name="variant-name" id="variant-name" label="Variant Name" required
            value="{{ old('variant-name') }}" />
        @error('variant-name')
            <x-general.input.input-error :messages="$message" />
        @enderror
    </div>


    @if (!old('option-name-1'))
        <div class="flex flex-col gap-4 variant-option">
            <div class="flex items-center justify-between gap-4 heading">
                <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option 1
                </h3>
            </div>
            <div class="flex flex-col w-full gap-4 sm:flex-row">
                <div class="flex flex-col w-full gap-2">
                    <x-general.input.input class="option-name" name="option-name-1" id="option-name-1" label="Name"
                        required />
                    @error('option-name-*')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
                <div class="flex flex-col w-full gap-2">
                    <x-general.input.input class="option-price" required name="option-price-1" id="option-price-1"
                        type="number" label="Price $" value="0" />
                    <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to
                        the original
                        product price</p>
                    @error('option-price-*')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
                <div class="flex flex-col w-full gap-2">
                    <x-general.input.input class="option-stock" name="option-stock-1" id="option-stock-1" label="Stock"
                        required type="number" />
                    @error('option-stock-*')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
            </div>
        </div>
    @else
        @php
            $index = 1;
        @endphp

        @while (old('option-name-' . $index))
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
                        <x-general.input.input class="option-name" name="option-name-{{ $index }}"
                            id="option-name-{{ $index }}" label="Name" required
                            value="{{ old('option-name-' . $index) }}" />
                        @error('option-name-*')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-2">
                        <x-general.input.input class="option-price" required name="option-price-{{ $index }}"
                            id="option-price-{{ $index }}" type="number" label="Price $"
                            value="{{ old('option-price-' . $index) }}" />
                        <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to
                            the original
                            product price</p>
                        @error('option-price-*')
                            <x-general.input.input-error :messages="$message" />
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-2">
                        <x-general.input.input class="option-stock" name="option-stock-{{ $index }}"
                            id="option-stock-{{ $index }}" label="Stock" required type="number"
                            value="{{ old('option-stock-' . $index) }}" />
                        @error('option-stock-*')
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
        function addAttributes(title, nameInput, priceInput, stockInput, index) {
            nameInput.attr('id', `option-name-${index}`)
            nameInput.attr('name', `option-name-${index}`)

            priceInput.attr('id', `option-price-${index}`)
            priceInput.attr('name', `option-price-${index}`)

            stockInput.attr('id', `option-stock-${index}`)
            stockInput.attr('name', `option-stock-${index}`)

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
                let nameInput = item.find('.option-name')
                let priceInput = item.find('.option-price')
                let stockInput = item.find('.option-stock')

                if (title && nameInput && priceInput && stockInput) {
                    addAttributes(title, nameInput, priceInput, stockInput, index)
                    index++
                }
            })
        }


        $('#increase').on('click', function() {
            $(this).hide()
            let parent = $(this).parent()
            let newItem = parent.find('.variant-option').clone()
            let index = parent.children().length - 2

            console.log(index)

            let title = newItem.find('h3')

            let nameInput = newItem.find('.option-name')
            let priceInput = newItem.find('.option-price')
            let stockInput = newItem.find('.option-stock')

            newItem.find('.heading').append(
                '<i class="text-red-500 cursor-pointer h-7 bi bi-trash-fill w-7 delete-icon dark:text-red-700" ></i>'
            )

            addAttributes(title, nameInput, priceInput, stockInput, index)

            nameInput.val('')
            priceInput.val(0)
            stockInput.val('')

            newItem.removeClass('variant-option')
            newItem.insertBefore(this)

            newItem.find('.delete-icon').on('click', deleteItem)
            $(this).fadeIn()
        })

        $('.delete-icon').on('click', deleteItem)
    </script>
@endpush
