<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Classes') }}</h1>
    </x-slot>

    <div class="py-4">
        @if (session()->has('message'))
            <div id="alert-3" x-data="{ show: true }" x-show="show == true"
                x-init="setTimeout(() => show = false, 3000)"
                class="
                flex p-4 mb-4 bg-{{ session()->get('class') }}-100 rounded-lg dark:bg-{{ session()->get('class') }}-200"
                role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-{{ session()->get('class') }}-700 dark:text-{{ session()->get('class') }}-800"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div
                    class="ml-3 text-sm font-medium text-{{ session()->get('class') }}-700 dark:text-{{ session()->get('class') }}-800">
                    {{ session()->get('message') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-{{ session()->get('class') }}-100 text-{{ session()->get('class') }}-500 rounded-lg focus:ring-2 focus:ring-{{ session()->get('class') }}-400 p-1.5 hover:bg-{{ session()->get('class') }}-200 inline-flex h-8 w-8 dark:bg-{{ session()->get('class') }}-200 dark:text-{{ session()->get('class') }}-600 dark:hover:bg-{{ session()->get('class') }}-300"
                    data-collapse-toggle="alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex items-center justify-center ">
            <div class="flex border-2 border-gray-200 rounded">
                <input wire:model="search" type="text" class="px-4 py-2 w-80" placeholder="Search...">

                <a href="{{ route('classes.create') }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Create
                </a>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Division
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($classes as $class)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $class->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $class->divisions()->pluck('name')->implode(', ') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('classes.edit', $class->id) }}"
                                                class="bg-blue-600 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-600 rounded">Edit</a>
                                            <a href="javascript:void(0)" Wire:click="adminDelete({{ $class->id }})"
                                                class="bg-red-600 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-600 rounded">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $classes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
