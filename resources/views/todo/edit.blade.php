<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7x1 sm:px-6 1g:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('todo.update', $todo) }}" class="">
                        @csrf
                        @method('patch')
                        <div class="mb-6">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                                :value="old('name', $todo->title)" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-cancel-button href="{{ route('todo.index') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
