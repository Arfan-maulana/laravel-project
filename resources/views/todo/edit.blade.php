<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Todo') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('todo.update', $todo) }}" class="">
                            @csrf
                            @method('patch')
                            <div class="mb-6">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                    :value="old('name', $todo->title)" required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{__('Save')}}</x-primary-button>
                                <x-cancel-button href="{{ route('todo.index') }}" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
