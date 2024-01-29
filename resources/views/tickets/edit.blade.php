<x-app-layout>
    <x-slot name="title">
        {{ __('messages.edit_ticket') }}
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('messages.edit_ticket') }}
            </h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="max-w-md mx-auto space-y-6">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <x-input-label for="number" :value="__('messages.ticket_number')" />
                    <x-text-input id="number" name="number" type="number" class="mt-1 block w-full" required
                        :value="old('number', $ticket->number)" />
                    <x-input-error :messages="$errors->get('number')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="description" :value="__('messages.description')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                        :value="old('description', $ticket->description)" required />
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="priority" :value="__('messages.priority')" />

                    <x-bladewind::select name="priority" placeholder="Select Priority" data="manual" required="true"
                        selected_value="{{ $ticket->priority }}">
                        <x-bladewind::select-item label="{{ __('messages.low') }}" value="low" />
                        <x-bladewind::select-item label="{{ __('messages.medium') }}" value="medium" />
                        <x-bladewind::select-item label="{{ __('messages.high') }}" value="high" />
                    </x-bladewind::select>


                </div>

                <div class="form-group mb-4">
                    <x-input-label for="reported_by_phone" :value="__('messages.reported_by_phone')" />
                    <x-text-input id="reported_by_phone" name="reported_by_phone" type="number"
                        class="mt-1 block w-full" required :value="old('reported_by_phone', $ticket->reported_by_phone)" />
                    <x-input-error :messages="$errors->get('reported_by_phone')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="contact_phone" :value="__('messages.phone')" />
                    <x-text-input id="contact_phone" name="contact_phone" type="number" class="mt-1 block w-full"
                        required :value="old('contact_phone', $ticket->contact_phone)" />
                    <x-input-error :messages="$errors->get('contact_phone')" />
                </div>

                <div class="form-group mb-4">
                    <x-input-label for="reported_model_type" :value="__('messages.reported_model_type')" />
                    <x-text-input id="reported_model_type" name="reported_model_type" type="text"
                        class="mt-1 block w-full" required :value="old('reported_model_type', $ticket->reported_model_type)" />
                    <x-input-error :messages="$errors->get('reported_model_type')" />
                </div>

                <x-primary-button>{{ __('messages.update') }}</x-primary-button>
            </form>

        </div>
    </div>


</x-app-layout>
