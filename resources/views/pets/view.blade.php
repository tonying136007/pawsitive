@extends('layouts.app')

@section('content') 
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">

    <div class="flex flex-wrap">
        <div class="w-full">
            <span class="block text-base font-semibold text-gray-700 px-4 py-3">
                Pets associated to: {{ $client->client_first_name }} {{ $client->client_last_name }} 
            </span>
        </div>
        @foreach ($pets as $pet)
            <div class="w-full md:w-1/3 p-4">
                <div class="flex flex-col h-full bg-white shadow">
                    <div class="px-6 py-6 pb-0 border-t-4 border-green flex-1">
                        <div class="flex mb-4 md:mb-0 justify-between items-center">
                            <!-- You can replace "Online" with a dynamic status based on the pet's availability -->
                            <span class="bg-green px-4 py-3 text-white text-sm rounded-full font-semibold">Online</span>
                            <!-- You can replace the amount with dynamic pricing or any other relevant info -->
                            <span class="bg-grey-lighter px-4 py-2 text-grey-darkest text-xs rounded-full font-semibold"><span class="-mt-1">Status: </span><span class="text-lg text-black"></span></span>
                        </div>
                        <!-- Commented out the image part -->
                        <!-- <img src="{{ $pet->image_url }}" height="200" class="rounded-full mx-auto block mb-3 -mt-6 shadow-md"> -->
                        <div class="text-center text-xl mb-2">{{ $pet->pet_name }}</div>
                        <!-- You can replace the age and location with dynamic pet information -->
                        <div class="text-center text-grey-dark mb-6">{{ $pet->age }} <span class="text-grey-light px-1">Birthdate: </span> {{ $pet->pet_bdate }}</div>
                        <!-- Additional details or tags can be added here -->
                        <div class="text-center mb-6 flex flex-wrap justify-center">
                            <!-- Example: Distance away from the user -->
                            <span class="border-2 border-grey-light px-4 py-2 rounded-full text-sm text-grey-darker mr-1 mb-1">Type: {{ $pet->pet_type }}</span>
                            <!-- Example: Rating or reviews -->
                            <span class="border-2 border-grey-light px-4 py-2 rounded-full text-sm text-grey-darker mr-1 mb-1">Breed: {{ $pet->pet_breed }}</span>
                        </div>
                        <!-- Description of the pet -->
                        <div class="text-grey-darker mb-4">
                            {{ $pet->description }}
                        </div>
                        <!-- You can add more sections or borders for additional information if needed -->
                        <div class="border border-grey-light mb-2 mx-8"></div>
                    </div>
                    <!-- Button to view the pet's full profile -->
                    <div class="flex justify-center items-end py-4 px-6">
                        <a href="{{ route('pets.view', $pet->id) }}" class="block font-semibold uppercase hover:bg-green hover:text-white no-underline text-grey-darkest">
                            View Records
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
