<x-app-layout>
    <x-slot name="title">
        {{ __('messages.categories') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('messages.categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12 px-4">
                <div class="relative overflow-x-auto  sm:rounded-lg">
                    <div class="flex justify-end gap-2 px-2 py-4">
                        <a href="{{ route('categories.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ __('messages.create_new_category') }}</a>

                    </div>
                    <x-bladewind::table :data="$categories->toArray()['data']" :action_icons="$action_icons" :column_aliases="$captions"
                        exclude_columns="id, updated_at, deleted_at, created_at, notifiable" striped="true"
                        divider="thin" has_shadow="true" compact="true" actions_title="{{ __('Actions') }}" />

                    <div class="pagination-container py-4">
                        {{ $categories->links() }}
                    </div>

                    <x-bladewind::modal name="delete-category" type="error" title="Confirm Category Deletion"
                        ok_button_action="executDelete()">
                        Are you really sure you want to delete <b class="title"></b>?
                        This action cannot be reversed.

                        <x-text-input id="cat_id" type="hidden" />
                    </x-bladewind::modal>
                </div>

            </div>
        </div>
    </div>

    </div>

    <script>
        deleteCategory = (id, title) => {
            showModal('delete-category')

            domEl('#cat_id').value = id;
            domEl('.bw-delete-category .title').innerText = title;
        };

        executDelete = () => {
            const id = document.getElementById('cat_id').value;
            if (id) {
                axios.delete(route('categories.destroy', id), {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    })
                    .then(response => {

                        const data = response.data;

                        showNotification('Delete Successful', data.success);

                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);

                    })
                    .catch(error => {

                        let errorMessage = error.response && error.response.data && error.response.data.message ?
                            error.response.data.message :
                            error.message;

                        showNotification('Delete Failed', errorMessage, 'error');
                    });
            };
        }
    </script>
</x-app-layout>
