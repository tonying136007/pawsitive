@extends('layouts.app')

@section('content')
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-md font-semibold mb-6">Edit Account</h1>

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="client_first_name" class="block text-gray-700 text-sm font-bold mb-2">Client First Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_first_name" name="client_first_name" value="{{ $client->client_first_name }}" required>
            </div>

            <div class="mb-4">
                <label for="client_last_name" class="block text-gray-700 text-sm font-bold mb-2">Client Last Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_last_name" name="client_last_name" value="{{ $client->client_last_name }}" required>
            </div>

            <div class="mb-4">
                <label for="client_middle_name" class="block text-gray-700 text-sm font-bold mb-2">Client Middle Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_middle_name" name="client_middle_name" value="{{ $client->client_middle_name }}" required>
            </div>

            <div class="mb-4">
                <label for="client_address" class="block text-gray-700 text-sm font-bold mb-2">Client Address</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_address" name="client_address" value="{{ $client->client_address }}" required>
            </div>

            <div class="mb-4">
                <label for="client_contact_num" class="block text-gray-700 text-sm font-bold mb-2">Client Contact Number</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="client_contact_num" name="client_contact_num" value="{{ $client->client_contact_num }}" required>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Account</button>
            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="window.location.href='{{ route('clients.index') }}'">Cancel</button>
        </form>
    </div>
</div>
@endsection
