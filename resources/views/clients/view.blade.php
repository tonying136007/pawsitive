@extends('layouts.app')

@section('content') 
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
<div class="grid grid-cols-2 gap-8 mx-auto max-w-7xl">
    <!-- Left Column: Client Information -->
    <div class="col-span-1">
        <div class="ml-14 mt-14 mb-10 md:ml-0">
            <span class="block text-base font-semibold text-gray-700 px-4 py-3">
                Owners Information: {{ $client->client_first_name }} {{ $client->client_last_name }} 
            </span>
            <!-- Add any client information you want to display here -->
            <div class="col-span-1">
        <div class="ml-14 mt-14 mb-10 md:ml-0">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-4">
                <div class="border-t border-gray-200">
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Contact Number: </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $client->client_contact_num }}</dd>
                        </div>
                        <!-- Add more client information fields here if needed -->
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $client->client_address }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <!-- Right Column: List of Pets -->
    <div class="col-span-1">
        <div class="ml-14 mt-14 mb-10 md:ml-0">
            <span class="block text-base font-semibold text-gray-700 px-4 py-3">
                Pets associated to: {{ $client->client_first_name }} {{ $client->client_last_name }} 
            </span>
            <ul class="divide-y divide-gray-200">
                @foreach ($pets as $pet)
                <li class="py-4">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-lg font-semibold text-gray-900">{{ $pet->pet_name }}</div>
                            <div class="text-sm text-gray-500">{{ $pet->age }} years old, Birthdate: {{ $pet->pet_bdate }}</div>
                            <div class="text-sm text-gray-500">Type: {{ $pet->pet_type }}, Breed: {{ $pet->pet_breed }}</div>
                            <div class="text-sm text-gray-500">{{ $pet->description }}</div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection