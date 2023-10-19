{{-- TODO: decide whether keep file  --}}

<x-vendor.layout.main page="Products Variants">
    <section class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        <x-vendor.layout.heading title="Create Variant" :crumbs="[
            ['name' => 'products', 'route' => route('vendor.products.index')],
            ['name' => 'variant', 'route' => route('vendor.products.variants.index', $product->id)],
            ['name' => 'create'],
        ]" />

        <form method="POST" action="{{ route('vendor.products.variants.store', $product->id) }}"
            class="flex flex-col gap-8">
            @csrf
            <div class="flex flex-col gap-8 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant</h2>

                <div class="flex flex-col w-full gap-2">
                    <div class="relative" data-te-input-wrapper-init>
                        <input required type="text"name="name" id="name" placeholder="Name"
                            class="form-input peer" value="{{ old('name') }}">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    @error('name')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>

                <div class="flex flex-col w-full gap-2">
                    <select required data-te-select-init data-te-select-size="lg" name="status" id="status"
                        value="{{ old('status') }}">
                        <option @if (old('status') === 'active') selected @endif value="active">Active</option>
                        <option @if (!old('status') === 'active') selected @endif value="inactive">Inactive</option>
                    </select>
                    <label data-te-select-label-ref for="status">
                        status
                    </label>
                    @error('status')
                        <x-general.input.input-error :messages="$message" />
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-4 p-6 pb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-medium text-gray-800 capitalize dark:text-gray-200">Variant Options</h2>

                <div class="flex flex-col gap-4 variant-option">
                    <div class="flex items-center justify-between gap-4 heading">
                        <h3 class="text-sm font-medium text-gray-800 capitalize dark:text-gray-200">Option 1
                        </h3>
                    </div>
                    <div class="flex flex-col w-full gap-4 sm:flex-row">
                        <div class="flex flex-col w-full gap-2">
                            <x-general.input.input class="option-name" name="option-name-1" id="option-name-1"
                                label="Name" required />
                            @error('option-name-1')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>
                        <div class="flex flex-col w-full gap-2">
                            <x-general.input.input class="option-price" required name="option-price-1"
                                id="option-price-1" type="number" label="Price $" value="0" />
                            <p class="text-xs text-gray-500 dark:text-gray-400">* Additional price to be added to
                                the original
                                product price</p>
                            @error('option-price-1')
                                <x-general.input.input-error :messages="$message" />
                            @enderror
                        </div>
                    </div>
                </div>

                <button id="increase" type="button"
                    class="text-brandRed capitalize text-end dark:text-brandRedDark">add
                    option</button>
            </div>

            <x-general.input.submit-button text="create" />
            </div>
        </form>
    </section>

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
                newItem.find('.heading').append(
                    '<i class="text-brandRed cursor-pointer h-7 bi bi-trash-fill w-7 delete-icon dark:text-brandRedDark" ></i>'
                )
                addAttributes(title, nameInput, priceInput, index)

                nameInput.val('')
                priceInput.val(0)

                newItem.removeClass('variant-option')
                newItem.insertBefore(this)

                newItem.find('.delete-icon').on('click', deleteItem)
                $(this).fadeIn()
            })
        </script>
    @endsection
</x-vendor.layout.main>
