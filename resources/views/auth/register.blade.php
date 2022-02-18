<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- School -->
            <div>
                <x-label for="school" :value="__('School')" />

                <x-form-select id="school" :value="old('school_id')" name="school_id" :options="$schools"
                    placeholder="Select school" />
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-label for="roles" :value="__('Roles')" />

                <x-form-select id="roles" :value="old('role')" name="role" :options="$roles"
                    placeholder="Select roles" />
                </div>

                <!-- First Name -->
                <div class="mt-4">
                    <x-label for="first_name" :value="__('First Name')" />

                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')"  autofocus />
                    <x-filed-error :name="'first_name'"></x-filed-error>
                </div>

                <!-- Last Name -->
                <div class="mt-4">
                    <x-label for="last_name" :value="__('Last Name')" />

                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                     autofocus />
                    <x-filed-error :name="'last_name'"></x-filed-error>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
                    <x-filed-error :name="'email'"></x-filed-error>
                </div>

                <!-- Mobile Number -->
                <div class="mt-4">
                    <x-label for="mobile" :value="__('Mobile')" />

                    <x-input id="mobile" class="block mt-1 w-full" type="tel" name="mobile" :value="old('mobile')"
                     />
                    <x-filed-error :name="'mobile'"></x-filed-error>
                </div>

                <!-- Date Of Birth -->
                <div class="mt-4">
                    <x-label for="date_of_birth" :value="__('Date Of Birth')" />

                    <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth"
                    :value="old('date_of_birth')"  />
                    <x-filed-error :name="'date_of_birth'"></x-filed-error>
                </div>

                <!-- Gender -->
                <div class="mt-4">
                    <x-label for="gender" :value="__('Gender')" />

                    <x-form-select id="gender" :value="old('gender')" name="gender" :options="$gender"
                    placeholder="Select gender" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />
                    <x-filed-error :name="'password'"></x-filed-error>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation"  />
                    <x-filed-error :name="'password_confirmation'"></x-filed-error>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
