<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Examination') }}</h1>
    </x-slot>

    <div class="py-4">

        <form wire:submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div>

                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="examination_group_id"
                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Examination Group
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model='examination_group_id' id="examination_group_id"
                                    name="examination_group_id" autocomplete="examination_group_id-name"
                                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="">{{ __('Select examination group') }}</option>
                                    @foreach ($examinationGroups as $examinationGroup)
                                        <option value="{{ $examinationGroup->id }}">
                                            {{ Str::ucfirst($examinationGroup->name) }}</option>
                                    @endforeach
                                </select>
                                @error('examination_group_id') <span
                                        class="error text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="examinationable_id"
                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Class
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model='examinationable_id' id="examinationable_id"
                                    name="examinationable_id" autocomplete="examinationable_id-name"
                                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="">{{ __('Select class') }}</option>
                                    @foreach ($clases as $class)
                                        <option value="{{ $class->id }}">
                                            {{ Str::ucfirst($class->name) }}</option>
                                    @endforeach
                                </select>
                                @error('examinationable_id') <span class="error text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="supervision_teacher_id"
                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Supervision teacher
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select wire:model='supervision_teacher_id' id="supervision_teacher_id"
                                    name="supervision_teacher_id" autocomplete="supervision_teacher_id-name"
                                    class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="">{{ __('Select supervision teacher') }}</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ Str::ucfirst($teacher->full_name) }}</option>
                                    @endforeach
                                </select>
                                @error('supervision_teacher_id') <span
                                        class="error text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model='name' type="text" name="name" id="name" autocomplete="given-name"
                                    class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                @error('name') <span class="error text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="start_date_time"
                                class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Start Datetime
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model='start_date_time' type="datetime-local" name="start_date_time"
                                    id="start_date_time" autocomplete="start_date_time"
                                    class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                @error('start_date_time') <span class="error text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="total_time" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Total Time
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model='total_time' type="number" name="total_time" id="total_time"
                                    autocomplete="given-total_time"
                                    class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                @error('total_time') <span class="error text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="total_marks" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Total Marks
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model='total_marks' type="number" name="total_marks" id="total_marks"
                                    autocomplete="given-total_marks"
                                    class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                @error('total_marks') <span class="error text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="passout_marks" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Passout Marks
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input wire:model='passout_marks' type="number" name="passout_marks" id="passout_marks"
                                    autocomplete="given-passout_marks"
                                    class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                                @error('passout_marks') <span class="error text-red-700">{{ $message }}</span>
                                @enderror
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
