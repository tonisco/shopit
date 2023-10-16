<div x-cloak x-show="itemSelected === 'others'" class="flex flex-col gap-8">

    <div>
        <x-general.utils.button text="Delete Account" type="button" class="deleteButton" />
    </div>

    <x-general.utils.delete-modal item="your vendor account"
        subtitle="This process is irreversable and will delete all your products"
        route="{{ route('vendor.account.delete') }}" />
</div>


@push('scripts')
    <script type="text/javascript">
        let modal = $('.delete-modal')

        function closeModal() {
            $('body').removeAttr('style')
            let modalContent = $('.delete-modal-content')
            modalContent.removeClass('slideIn')
            modalContent.addClass('slideOut')

            setTimeout(() => {
                modal.hide()

                modalContent.removeClass('slideOut')
                modalContent.addClass('slideIn')

            }, 300);
        }

        modal.on('click', function(e) {
            e.stopPropagation()
            closeModal()
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

        $('.delete-cancel-button').on('click', closeModal)

        $('.deleteButton').on('click', openDeleteModal)
    </script>
@endpush
