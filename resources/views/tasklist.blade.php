<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="py-12 grid grid-cols-6">
        <div class="col-span-4 col-start-2">
            <livewire:task-list />
        </div>
    </div>
</x-app-layout>
