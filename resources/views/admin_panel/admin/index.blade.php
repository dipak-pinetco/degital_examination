<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Admin') }}</h1>
    </x-slot>
    @livewire('admin.list-admin')
</x-app-layout>
