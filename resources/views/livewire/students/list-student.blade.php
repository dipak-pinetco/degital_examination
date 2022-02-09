<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Teacher') }}</h1>
    </x-slot>

    <div class="py-4">
        @livewire('component.flash-message')
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex items-center justify-center ">
            <div class="flex border-2 border-gray-200 rounded">
                <input wire:model="search" type="text" class="px-4 py-2 w-80" placeholder="Search...">

                <a href="{{ route('students.create') }}"
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
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="{{ $student->avatar_path }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $student->full_name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $student->email }} , {{ $student->mobile }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ in_array($student->status, array_keys(config('constant.status_color')))? 'bg-' .config('constant.status_color')[$student->status] .'-100 text-' .config('constant.status_color')[$student->status] .'-800': '' }}  ">
                                                {{ $student->status_text }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ Str::ucfirst($student->roles[0]->name) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="bg-blue-600 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-600 rounded">Edit</a>
                                            <a href="javascript:void(0)"
                                                Wire:click="studentDelete({{ $student->id }})"
                                                class="bg-red-600 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-600 rounded">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
