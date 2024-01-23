<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-bladewind::table :data="$users->toArray()['data']"
                        :action_icons="$action_icons"
                        :column_aliases="$captions" 
                        exclude_columns="id, updated_at, deleted_at, created_at" 
                        striped="true" divider="thin" has_shadow="true" compact="true" actions_title="{{ __('Actions') }}" 
                    />
                        
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
