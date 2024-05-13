@extends('layouts.app')

@section('content')
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-md font-semibold mb-6">Edit Account</h1>

        <form action="{{ route('accounts.update', $account->id) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm ont-bold mb-2">Email</label>
                <input type="email" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" value="{{ $account->email }}" required>
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" value="{{ $account->username }}" required>
            </div>
            <div class="mb-4">
                <label for="user_type_id" class="block text-gray-700 text-sm font-bold mb-2">User Type</label>
                <select class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="user_type_id" name="user_type_id" required>
                    <option value="1" {{ $account->user_type_id == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $account->user_type_id == 2 ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <button type="submit" id="edit-button" class="bg-blue-500 hover:bg-blue-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Account</button>
            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="window.location.href='{{ route('accounts.index') }}'">Cancel</button>
        </form>
    </div>
</div>
@endsection