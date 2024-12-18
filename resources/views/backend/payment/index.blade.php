@extends('layouts.app')

@section('title', 'Payment List')

@section('content')
    <div class="container mx-auto p-4 h-screen overflow-auto">

        <!-- Button to Add New Payment -->
        <button onclick="openCreateModal()" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-green mt-4 inline-block">
            <i class="fas fa-plus"></i> Add New Payment
        </button>

        <!-- Table for Payment -->
        <div class="mt-6 overflow-x-auto bg-w">
            <table class="w-full table-auto border-collapse text-white text-center">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b text-lg">Name</th>
                        <th class="px-6 py-3 border-b text-lg">Table Number</th>
                        <th class="px-6 py-3 border-b text-lg">Total Time</th>
                        <th class="px-6 py-3 border-b text-lg">Total Price</th>
                        <th class="px-6 py-3 border-b text-lg">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payment as $payment)
                        <tr class="bg-gray-800 hover:bg-gray-700">
                            <td class="px-6 py-4 border-b">{{ $payment->name }}</td>
                            <td class="px-6 py-4 border-b">{{ $payment->table_number }}</td>
                            <td class="px-6 py-4 border-b">
                                {{ $payment->total_time_hours }}h 
                                {{ $payment->total_time_minutes }}m 
                                {{ $payment->total_time_seconds }}s
                            </td>
                            <td class="px-6 py-4 border-b">Rp{{ number_format($payment->total_price, 2) }}</td>
                            <td class="px-6 py-4 border-b">
                                <!-- Edit Button -->
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-700" onclick="openEditModal({{ $payment->id }}, '{{ $payment->name }}', {{ $payment->table_number }}, {{ $payment->total_time_hours }}, {{ $payment->total_time_minutes }}, {{ $payment->total_time_seconds }}, {{ $payment->total_price }})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Delete Button -->
                                <button class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-700" onclick="openDeleteModal({{ $payment->id }})">
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
            <h2 class="text-xl font-bold text-teal-500">Add New Payment</h2>
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf

                <!-- Input Name -->
                <div class="mb-4">
                    <label for="create_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="create_name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Table Number -->
                <div class="mb-4">
                    <label for="create_table_number" class="block text-sm font-medium text-gray-700">Table Number</label>
                    <input type="number" id="create_table_number" name="table_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Time Hours -->
                <div class="mb-4">
                    <label for="create_total_time_hours" class="block text-sm font-medium text-gray-700">Total Time (Hours)</label>
                    <input type="number" id="create_total_time_hours" name="total_time_hours" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Time Minutes -->
                <div class="mb-4">
                    <label for="create_total_time_minutes" class="block text-sm font-medium text-gray-700">Total Time (Minutes)</label>
                    <input type="number" id="create_total_time_minutes" name="total_time_minutes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Time Seconds -->
                <div class="mb-4">
                    <label for="create_total_time_seconds" class="block text-sm font-medium text-gray-700">Total Time (Seconds)</label>
                    <input type="number" id="create_total_time_seconds" name="total_time_seconds" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Price -->
                <div class="mb-4">
                    <label for="create_total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                    <input type="number" id="create_total_price" name="total_price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required step="0.01">
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                        <i class="fas fa-save"></i> Save Payment
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
            <h2 class="text-xl font-bold text-teal-500">Edit Payment</h2>
            <form id="editForm" action="{{ route('payment.update', 0) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Name -->
                <div class="mb-4">
                    <label for="edit_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="edit_name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Table Number -->
                <div class="mb-4">
                    <label for="edit_table_number" class="block text-sm font-medium text-gray-700">Table Number</label>
                    <input type="number" id="edit_table_number" name="table_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Time Hours -->
                <div class="mb-4">
                    <label for="edit_total_time_hours" class="block text-sm font-medium text-gray-700">Total Time (Hours)</label>
                    <input type="number" id="edit_total_time_hours" name="total_time_hours" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Time Minutes -->
                <div class="mb-4">
                    <label for="edit_total_time_minutes" class="block text-sm font-medium text-gray-700">Total Time (Minutes)</label>
                    <input type="number" id="edit_total_time_minutes" name="total_time_minutes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Time Seconds -->
                <div class="mb-4">
                    <label for="edit_total_time_seconds" class="block text-sm font-medium text-gray-700">Total Time (Seconds)</label>
                    <input type="number" id="edit_total_time_seconds" name="total_time_seconds" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <!-- Input Total Price -->
                <div class="mb-4">
                    <label for="edit_total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                    <input type="number" id="edit_total_price" name="total_price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required step="0.01">
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-700">
                        <i class="fas fa-save"></i> Update Payment
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
            <h2 class="text-xl font-bold text-red-500">Delete Payment</h2>
            <p class="mb-4">Are you sure you want to delete this payment?</p>
            <form id="deleteForm" action="{{ route('payment.destroy', 0) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="mb-4">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                        <i class="fas fa-trash"></i> Delete Payment
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

        function openEditModal(id, name, table_number, total_time_hours, total_time_minutes, total_time_seconds, total_price) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editForm').action = "/payment/" + id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_table_number').value = table_number;
            document.getElementById('edit_total_time_hours').value = total_time_hours;
            document.getElementById('edit_total_time_minutes').value = total_time_minutes;
            document.getElementById('edit_total_time_seconds').value = total_time_seconds;
            document.getElementById('edit_total_price').value = total_price;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function openDeleteModal(id) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = "/payment/" + id;
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
