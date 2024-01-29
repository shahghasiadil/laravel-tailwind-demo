{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-bladewind::table :data="$users->toArray()['data']" :action_icons="$action_icons" :column_aliases="$captions"
                        exclude_columns="id, updated_at, deleted_at, created_at" striped="true" divider="thin"
                        has_shadow="true" compact="true" actions_title="{{ __('Actions') }}" />

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="title">
        {{ __('Users list') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-12 px-4">
                <div class="relative overflow-x-auto  sm:rounded-lg">
                    <div class="flex justify-end gap-2 px-2 py-4">
                        <a href="{{ route('users.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ __('messages.create_new_user') }}</a>

                    </div>

                    <x-bladewind::table :data="$users->toArray()['data']" :action_icons="$action_icons" :column_aliases="$captions"
                        exclude_columns="id, updated_at, deleted_at, created_at" striped="true" divider="thin"
                        has_shadow="true" compact="true" actions_title="{{ __('Actions') }}" />
                    <div class="pagination-container py-4">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.delete__user').forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        const currentForm = this;
                        Swal.fire({
                            title: `Are you sure you want to delete this User?`,
                            text: "If you delete this, it will be gone forever.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                currentForm.submit();
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
