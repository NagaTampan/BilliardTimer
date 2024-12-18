@extends('layouts.app')

@section('title', 'User List')

@section('content')
    <div class="container mx-auto p-4 h-screen overflow-auto">
        
        <!-- Global Status/Error Message -->
        @if (session('status'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                {{ session('status') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <!-- Button to Add New User -->
        <button onclick="openCreateModal()" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-green mt-4 inline-block">
            <i class="fas fa-plus"></i> Add New User
        </button>

        <!-- Table for Users -->
        <div class="mt-6 overflow-x-auto bg-w">
            <table class="w-full table-auto border-collapse text-white text-center">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b text-lg">Name</th>
                        <th class="px-6 py-3 border-b text-lg">Email</th>
                        <th class="px-6 py-3 border-b text-lg">Password</th>
                        <th class="px-6 py-3 border-b text-lg">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-gray-800 hover:bg-gray-700">
                            <td class="px-6 py-4 border-b">{{ $user->name }}</td>
                            <td class="px-6 py-4 border-b">{{ $user->email }}</td>
                            <td class="px-6 py-4 border-b">{{ $user->password }}</td>
                            <td class="px-6 py-4 border-b">
                                <!-- Edit Button -->
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-700" onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Delete Button -->
                                <button class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-700" onclick="openDeleteModal({{ $user->id }})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Modal -->
    <div id="createModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold text-teal-500">Add New User</h2>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Input Name -->
                <div class="mb-4">
                    <label for="create_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="create_name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Email -->
                <div class="mb-4">
                    <label for="create_email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="create_email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

            <!-- Input Password -->
<div class="mb-4">
    <label for="create_password" class="block text-sm font-medium text-gray-700">Password</label>
    <input type="password" id="create_password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    @error('password')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>

<!-- Input Konfirmasi Password -->
<div class="mb-4">
    <label for="create_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
    <input type="password" id="create_password_confirmation" name="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    @error('password_confirmation')
        <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
</div>


                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                        <i class="fas fa-save"></i> Save User
                    </button>

                    <button onclick="closeCreateModal()" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold text-teal-500">Edit User</h2>
            <form id="editForm" action="{{ route('users.update', 0) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Name -->
                <div class="mb-4">
                    <label for="edit_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="edit_name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Email -->
                <div class="mb-4">
                    <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="edit_email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-700">
                        <i class="fas fa-save"></i> Update User
                    </button>
                    <button onclick="closeEditModal()" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold text-red-500">Delete User</h2>
            <p class="mb-4">Are you sure you want to delete this user?</p>
            <form id="deleteForm" action="{{ route('users.destroy', 0) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="mb-4">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                        <i class="fas fa-trash"></i> Delete User
                    </button>
                    <button onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal control JavaScript functions
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function openEditModal(id, name, email) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editForm').action = "/users/" + id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_email').value = email;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function openDeleteModal(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = "/users/" + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
