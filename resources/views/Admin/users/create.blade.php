<x-app-layout>
    <x-slot name="head">
        <!-- DataTables CSS for Tailwind -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.users.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                                    <!-- Left Column -->
                                    <div>
                                        <!-- Name -->
                                        <div>
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" class="block mt-1 w-full" type="text"
                                                name="name" :value="old('name')" required autofocus
                                                autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                name="email" :value="old('email')" required autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password" name="password_confirmation"
                                                autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <!-- Age -->
                                        <div>
                                            <x-input-label for="age" :value="__('Age')" />
                                            <x-text-input id="age" class="block mt-1 w-full" type="number"
                                                name="age" :value="old('age')" />
                                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div>


                                        <!-- Gender -->
                                        <div class="mt-4">
                                            <x-input-label for="gender" :value="__('Gender')" />
                                            <select id="gender" name="gender"
                                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                                <option value="">{{ __('Select Gender') }}</option>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                    {{ __('Male') }}</option>
                                                <option value="female"
                                                    {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                    {{ __('Female') }}</option>
                                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                                    {{ __('Other') }}</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                        </div>

                                        <!-- Caste -->
                                        <div class="mt-4">
                                            <x-input-label for="caste" :value="__('Caste')" />
                                            <x-text-input id="caste" class="block mt-1 w-full" type="text"
                                                name="caste" :value="old('caste')" />
                                            <x-input-error :messages="$errors->get('caste')" class="mt-2" />
                                        </div>

                                        <!-- Address -->
                                        <div class="mt-4">
                                            <x-input-label for="address" :value="__('Address')" />
                                            <x-text-input id="address" class="block mt-1 w-full" type="text"
                                                name="address" :value="old('address')" />
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>

                                        <!-- Profile Picture -->
                                        <div class="mt-4">
                                            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                                            <input id="profile_picture" type="file" name="profile_picture"
                                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                                accept="image/*">
                                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-4">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Create
                                        User</button>
                                </div>
                            </form>
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

    </x-slot>
</x-app-layout>
