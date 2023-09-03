<div class="trash-table-modal modal" style="display: none">
    <div class="trash-table-modal-content modal-content">
        <h2 class="text-xl text-gray-800 dark:text-gray-200">Are you sure you want to delete <span
                class="font-semibold capitalize delete-name">{{ $item }}</span></h2>

        @isset($subtitle)
            <p class="text-sm text-gray-800 dark:text-gray-200">{{ $subtitle }}</p>
        @endisset

        <div class="flex items-center self-end gap-2">
            <button
                class="px-3 py-2 bg-gray-200 shadow-md delete-cancel-button dark:bg-gray-900 dark:text-gray-200">Cancel</button>
            <form action="{{ $route }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="px-3 py-2 text-white bg-red-500 rounded shadow-md dark:bg-red-700 delete-item"
                    type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script type="text/javascript">
            let modal = $('.trash-table-modal')

            modal.on('click', function(e) {
                e.stopPropagation()
                modal.hide()
                $('body').removeAttr('style')
            })

            $('.trash-table-modal-content').on('click', function(e) {
                e.stopPropagation()
            })

            $('.delete-cancel-button').on('click', function(e) {
                modal.hide()
                $('body').removeAttr('style')
            })

            $('.deleteButton').on('click', function() {
                modal.show()
                $('body').css('overflow', 'hidden')

                $('.delete-item').on('click', function() {
                    deleteForm.submit()
                })
            })
        </script>
    @endpush
@endonce
