<div class="delete-modal modal" style="display: none">
    <div class="delete-modal-content modal-content slideIn">
        <h2 class="text-xl text-brandDark dark:text-brandLight">Are you sure you want to delete <span
                class="font-semibold capitalize delete-name">{{ $item }}</span></h2>

        @isset($subtitle)
            <p class="text-sm text-brandDark dark:text-brandLight">{{ $subtitle }}</p>
        @endisset

        <div class="flex items-center self-end gap-2">
            <button
                class="px-3 py-2 bg-brandLight shadow-md delete-cancel-button dark:bg-brandDarker dark:text-brandLight">Cancel</button>
            <form action="{{ $route ?? '' }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="px-3 py-2 text-white bg-brandRed rounded shadow-md dark:bg-brandRedDark delete-item"
                    type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>


{{-- <script type="text/javascript">
    let modal = $('.delete-modal')

    modal.on('click', function(e) {
        e.stopPropagation()
        modal.hide()
        $('body').removeAttr('style')
    })

    function openDeleteModal() {
        modal.show()
        $('body').css('overflow', 'hidden')

        $('.delete-item').on('click', function() {
            deleteForm.submit()
        })
    }

    $('.delete-modal-content').on('click', function(e) {
        e.stopPropagation()
    })

    $('.delete-cancel-button').on('click', function(e) {
        modal.hide()
        $('body').removeAttr('style')
    })

    $('.deleteButton').on('click', openDeleteModal)
</script> --}}
