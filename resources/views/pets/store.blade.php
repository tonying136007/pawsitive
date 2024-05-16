@extends('layouts.app')

@section('content')
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-md font-semibold mb-6">Add New Pet</h1>
        <form action="{{ route('pets.store') }}" method="POST" id="pet-form">
            @csrf

            <div class="mb-4">
                <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">Select Client</label>
                <select id="client_id" name="client_id" class="select2 appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->client_first_name }} {{ $client->client_last_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="pet_name" class="block text-gray-700 text-sm font-bold mb-2">Pet Name</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="pet_name" name="pet_name" required>
            </div>
            <div class="mb-4">
                <label for="pet_type" class="block text-gray-700 text-sm font-bold mb-2">Pet Type</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="pet_type" name="pet_type" required>
            </div>
            <div class="mb-4">
                <label for="pet_breed" class="block text-gray-700 text-sm font-bold mb-2">Pet Breed</label>
                <input type="text" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" id="pet_breed" name="pet_breed" required>
            </div>
            <div class="mb-4">
                <label for="pet_bdate" class="block text-gray-700 text-sm font-bold mb-2">Pet Birthdate</label>
                <input id="pet_bdate" type="date" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" name="pet_bdate" required>
            </div>
 
            
            <button type="submit" id="add-button" class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Pet</button>
            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="window.location.href='{{ route('pets.index') }}'">Cancel</button>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" ></script>

    <script>
    $(document).ready(function () {

    $('.select2').select2();
    $('#add-button').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('pets.create') }}",
            data: $('#pet-form').serialize(),
            success: function (data) {
                $('#pet-form')[0].reset();
                // Reload the page
                window.location.href = "{{ route('pets.index') }}";
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
});

    </script>
@endsection