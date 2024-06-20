<x-app-layout>
    <x-slot name="head">
        <!-- DataTables CSS for Tailwind -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <div class="container">
                                            <div
                                                class="card bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md overflow-hidden">
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                                                    <!-- Left Column: Profile Picture -->
                                                    <div
                                                        class="p-6 flex justify-center items-center md:border-r border-gray-200 dark:border-gray-700">
                                                        @if ($user->profile_picture)
                                                            <img src="{{ asset($user->profile_picture) }}"
                                                                alt="Profile Picture"
                                                                class="rounded-full h-32 w-32 object-cover">
                                                        @else
                                                            <div
                                                                class="bg-gray-200 dark:bg-gray-600 rounded-full h-32 w-32 flex items-center justify-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-16 w-16 text-gray-400" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path
                                                                        d="M17.293 18.707L2.586 4l1.414-1.414L18.707 17.293a1 1 0 01-1.414 1.414zM2.293 5.414l12 12A1 1 0 0016 16H4a1 1 0 01-1-1V6a1 1 0 011-1h.293z" />
                                                                </svg>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Right Column: Details -->
                                                    <div class="p-6">
                                                        <!-- Name -->
                                                        <div class="mb-4">
                                                            <x-input-label for="name" :value="__('Name')" />
                                                            <div class="text-lg font-semibold">{{ $user->name }}</div>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="mb-4">
                                                            <x-input-label for="email" :value="__('Email')" />
                                                            <div>{{ $user->email }}</div>
                                                        </div>

                                                        <!-- Age -->
                                                        <div class="mb-4">
                                                            <x-input-label for="age" :value="__('Age')" />
                                                            <div>{{ $user->age }}</div>
                                                        </div>

                                                        <!-- Gender -->
                                                        <div class="mb-4">
                                                            <x-input-label for="gender" :value="__('Gender')" />
                                                            <div>{{ ucfirst($user->gender) }}</div>
                                                        </div>

                                                        <!-- Caste -->
                                                        <div class="mb-4">
                                                            <x-input-label for="caste" :value="__('Caste')" />
                                                            <div>{{ $user->caste }}</div>
                                                        </div>

                                                        <!-- Address -->
                                                        <div class="mb-4">
                                                            <x-input-label for="address" :value="__('Address')" />
                                                            <div>{{ $user->address }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-slot name="scripts">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com/3.4.4"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>

    </x-slot>
</x-app-layout>
