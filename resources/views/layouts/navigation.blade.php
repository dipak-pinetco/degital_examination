{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open=!open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

<!-- Static sidebar for desktop -->
<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex-1 flex flex-col min-h-0 bg-indigo-700">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
                <img class="h-8 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
            </div>
            <nav class="mt-5 flex-1 px-2 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="{{ Route::is('dashboard*') ? 'bg-indigo-800 text-white' : 'text-white hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/home -->
                    <i class="mr-3 flex-shrink-0 h-8 w-6 text-indigo-300 fa fa-tachometer fa-2x" aria-hidden="true"></i>
                    {{ __('Dashboard') }}
                </a>
                @hasanyrole('admin')
                    <a href="{{ route('admins.index') }}"
                        class="{{ Route::is('admin*') ? 'bg-indigo-800 text-white' : 'text-white hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/home -->
                        <i class="mr-3 flex-shrink-0 h-8 w-6 text-indigo-300 fa fa-user-md fa-2x" aria-hidden="true"></i>
                        {{ __('Admin') }}
                    </a>
                    <a href="{{ route('teachers.index') }}"
                        class="{{ Route::is('teacher*') ? 'bg-indigo-800 text-white' : 'text-white hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/home -->
                        <i class="mr-3 flex-shrink-0 h-8 w-6 text-indigo-300 fa fa-user-circle-o fa-2x"
                            aria-hidden="true"></i>
                        {{ __('Teacher') }}
                    </a>
                    <a href="{{ route('classes.index') }}"
                        class="{{ Route::is('classes*') ? 'bg-indigo-800 text-white' : 'text-white hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/home -->
                        <i class="mr-3 flex-shrink-0 h-8 w-6 text-indigo-300 fa fa-graduation-cap fa-2x"
                            aria-hidden="true"></i>
                        {{ __('Classes') }}
                    </a>
                @endhasanyrole

                @hasanyrole('teacher|admin')
                    <a href="{{ route('students.index') }}"
                        class="{{ Route::is('student*') ? 'bg-indigo-800 text-white' : 'text-white hover:bg-indigo-600 hover:bg-opacity-75' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/home -->
                        <i class="mr-3 flex-shrink-0 h-8 w-6 text-indigo-300 fa fa-graduation-cap fa-2x"
                            aria-hidden="true"></i>
                        {{ __('Student') }}
                    </a>
                @endhasanyrole

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        :href="route('logout')" onclick="event.preventDefault();
                    this.closest('form').submit();">
                        <i class="mr-3 flex-shrink-0 h-8 w-6 text-indigo-300 fa fa-sign-out fa-2x"
                            aria-hidden="true"></i>
                        {{ __('Log Out') }}</a>
                </form>
            </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-indigo-800 p-4">
            <a href="#" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                    <div>
                        <img class="inline-block h-9 w-9 rounded-full" {{-- src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" --}}
                            src="{{ auth()->user()->avatar_path }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </p>
                        <p class="text-xs font-medium text-indigo-200 group-hover:text-white">
                            View profile
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
