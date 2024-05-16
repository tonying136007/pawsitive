@extends('layouts.app')

@section('content')
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-md font-semibold mb-6">Edit Pet Information</h1>

        <form action="{{ route('pets.update', $pet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="pet_name" class="block text-gray-700 text-sm font-bold mb-2">Pet Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="pet_name" name="pet_name" value="{{ $pet->pet_name }}" required>
            </div>
            <div class="mb-4">
                <label for="pet_type" class="block text-gray-700 text-sm font-bold mb-2">Pet Type</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="pet_type" name="pet_type" value="{{ $pet->pet_type }}" required>
            </div>
            <div class="mb-4">
                <label for="pet_breed" class="block text-gray-700 text-sm font-bold mb-2">Pet Breed</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="pet_breed" name="pet_breed" value="{{ $pet->pet_breed }}" required>
            </div>
            <div class="mb-4">
                <label for="pet_bdate" class="block text-gray-700 text-sm font-bold mb-2">Pet Birthdate</label>
                <input type="date" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="pet_bdate" name="pet_bdate" value="{{ $pet->pet_bdate }}">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Pet</button>
            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="window.location.href='{{ route('pets.index') }}'">Cancel</button>
        </form>
    </div>
</div>
@endsection
