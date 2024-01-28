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

                    {{-- <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 rk:texdark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('messages.title') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    @lang('messages.action')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $category->title }}
                                    </th>


                                    <td class="px-6 py-4 flex flex-column gap-2">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>

                                        </a>

                                        <span>
                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                method="POST" class="delete__category">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-button" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6 text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>

                                            </form>
                                        </span>


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table> --}}
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

                    .then(data => {
                        window.location.reload();
                    })
                    .catch(error => console.error('Error:', error));
            }
        };
    </script>
</x-app-layout>
