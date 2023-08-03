<x-vendor.layout.main page="Products create">


    <section class="flex flex-col flex-1 gap-6 px-6 py-8 overflow-x-hidden">
        <h1 class="text-3xl font-semibold text-gray-800 capitalize dark:text-gray-200">Create Product</h1>

        <form class="flex flex-col gap-4 p-8 bg-white shadow-lg rounded-2xl dark:bg-gray-800">

            <div class="flex flex-col gap-1">
                <label class="text-lg text-gray-800 dark:text-gray-200" for="image">Image</label>
                <input
                    class="relative focus:ring-red-500 dark:focus:ring-red-700 focus:border-red-500 dark:focus:border-red-700 m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:text-neutral-700 focus:shadow-te-danger focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
                    type="file" name="image" id="image">
            </div>

            <div class="relative mb-3" data-te-input-wrapper-init>
                <input type="text"name="name" id="name" placeholder="Name" class="form-input peer">
                <label for="name" class="form-label">Name</label>
            </div>

            <div class="flex gap-4">
                <div class="flex-1">
                    <select data-te-select-init data-te-select-size="lg" name="category" id="category">
                        <option>Select</option>
                    </select>
                    <label data-te-select-label-ref for="category">Category</label>
                </div>

                <div class="flex-1">
                    <select data-te-select-init data-te-select-size="lg" name="sub-category" id="sub-category">
                        <option>Select</option>
                    </select>
                    <label data-te-select-label-ref for="sub-category">Sub
                        Category</label>
                </div>
            </div>

            <div>
                <select data-te-select-init data-te-select-size="lg" name="brand" id="brand">
                    <option>Select</option>
                </select>
                <label data-te-select-label-ref for="brand">Brand</label>
            </div>

            <div class="relative mb-3" data-te-input-wrapper-init>
                <input class="form-input peer" placeholder="Price $" type="number" name="price" id="price">
                <label class="form-label" for="price">Price $</label>
            </div>

            <div class="relative mb-3" data-te-input-wrapper-init>
                <input class="form-input peer" type="number" name="discount" id="discount">
                <label class="form-label" for="discount">Discount %</label>
            </div>

            <div class="flex w-full gap-6">
                <x-utils.date-picker show-time :time24hr="false" min-date="today" label="Discount Date Range" clearable
                    range />
            </div>

            <div class="relative mb-3" data-te-input-wrapper-init>
                <input class="form-input peer" type="number" name="quantity" id="quantity">
                <label class="form-label" for="quantity">Stock Quantity</label>
            </div>

            <div class="relative mb-3" data-te-input-wrapper-init>
                <input class="form-input peer" type="text" name="short_description" id="short_description">
                <label class="form-label" for="short_description">Short
                    Description</label>
            </div>

            <div class="relative mb-3" data-te-input-wrapper-init>
                <textarea class="form-input peer"name="long_description" id="long_description" cols="30" rows="10"></textarea>
                <label class="form-label" for="long_description">Long
                    Description</label>
            </div>

            <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                <input
                    class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:hover:!bg-red-600 focus:ring-0 checked:border-red-500 checked:bg-red-500 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-red-500 dark:checked:bg-red-500 dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                    type="checkbox" value="" id="status" checked />
                <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="status">
                    Status
                </label>
            </div>
        </form>
    </section>


</x-vendor.layout.main>