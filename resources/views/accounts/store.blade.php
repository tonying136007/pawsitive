@extends('layouts.app')

@section('content')
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-md font-semibold mb-6">Create New Account</h1>
        <form action="{{ route('accounts.store') }}" method="POST" id="account-form">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" required>
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" required>
            </div>
            <div class="mb-4">
                <label for="passwor-confirm" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                <input id="password-confirm" type="password" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
            <div class="mb-4">
                <label for="user_type_id" class="block text-gray-700 text-sm font-bold mb-2">User Type</label>
                <select class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="user_type_id" name="user_type_id" required>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <div class="mb-4"><span class="text-base p-2">Personal information</span> </div>
            <div class="mb-4">
                <label for="client_first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_first_name" name="client_first_name" required>
            </div>
            <div class="mb-4">
                <label for="client_last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_last_name" name="client_last_name" required>
            </div>
            <div class="mb-4">
                <label for="client_middle_name" class="block text-gray-700 text-sm font-bold mb-2">Middle Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_middle_name" name="client_middle_name" required>
            </div>
            <div class="mb-4">
                <label for="client_address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_address" name="client_address" required>
            </div>
            <div class="mb-4">
                <label for="client_contact_num" class="block text-gray-700 text-sm font-bold mb-2">Contact Number</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_contact_num" name="client_contact_num" required>
            </div>

            
            <button type="submit" id="add-button" class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Account</button>
            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="window.location.href='{{ route('accounts.index') }}'">Cancel</button>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" ></script>

    <script>
    $(document).ready(function () {
    $('#add-button').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('accounts.create') }}",
            data: $('#account-form').serialize(),
            success: function (data) {
                $('#account-form')[0].reset();
                // Reload the page
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
});

    </script>
@endsection