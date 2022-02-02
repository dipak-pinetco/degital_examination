<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Classes') }}</h1>
    </x-slot>

    <div class="py-4">

        <form wire:submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Classes Information
                        </h3>

                    </div>
                    <div class="space-y-6 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="class-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Class name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model='name' type="text" name="class-name" id="class-name"
                                    autocomplete="given-name"
                                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                @error('name') <span class="error text-red-700">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
                <div class="pt-6 sm:pt-5">
                    <div role="group" aria-labelledby="label-email">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                            <div>
                                <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                    id="label-email">
                                    Classes Division
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg space-y-4">
                                    @foreach ($classes_divisions as $classes_division_key => $classes_division)
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="division{{ $classes_division_key }}"
                                                    wire:model.defer='divisions.{{ $classes_division }}'
                                                    value="{{ $classes_division }}" type="checkbox"
                                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="division{{ $classes_division_key }}"
                                                    class="font-medium text-gray-700">{{ $classes_division }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('divisions') <span class="error text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </button>
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
