<div class="delete-modal modal" style="display: none">
    <div class="delete-modal-content modal-content">
        <h2 class="text-xl text-gray-800 dark:text-gray-200">Are you sure you want to delete <span
                class="font-semibold capitalize delete-name"></span>
            @isset($itemName)
                {{ $itemName }}
            @endisset
        </h2>
        @isset($text)
            <p class="text-sm text-gray-800 dark:text-gray-200">{{ $text }}</p>
        @endisset
        <div class="flex items-center self-end gap-2">
            <button
                class="px-3 py-2 bg-gray-200 shadow-md delete-cancel-button dark:bg-gray-900 dark:text-gray-200">Cancel</button>
            <form action="" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="px-3 py-2 text-white bg-red-500 rounded shadow-md dark:bg-red-700 delete-item"
                    type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>

@prepend('scripts')
    <script type="text/javascript">
        $('.delete-modal-content').on('click', function(e) {
            e.stopPropagation()
        })

        $('.delete-cancel-button').on('click', function(e) {
            modal.hide()
        })

        modal.on('click', function(e) {
            e.stopPropagation()
            modal.hide()
        })
    </script>
@endprepend
