@extends('layouts.app')
@section('content')

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Profile Heading -->
                    <h1 class="text-2xl font-bold mb-4">Profile</h1>
                    <p class="mb-6">Manage your account information and password here.</p>

                    <!-- Profile Information -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-2">Profile Information</h2>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-2">Change Password</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                                    <input type="password" name="password" id="password"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Delete Account -->
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Delete Account</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Once you delete your account, all of your data will be permanently removed. Please download any information you want to keep before deleting your account.
                        </p>
                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-500 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                Delete Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection