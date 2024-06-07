@extends('layouts.user-nav-layout')

@section('content')
<!--CARDS-->
<section class="section0" id="sections">
    <div class="container mx-auto mt-10">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-blue-500 text-white text-center py-4 rounded-t-lg">
                <h1 class="text-2xl font-semibold">User Profile</h1>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Username:</label>
                        <p class="text-gray-900">{{ $user->username }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">First Name:</label>
                        <p class="text-gray-900">{{ $client->client_first_name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Middle Name:</label>
                        <p class="text-gray-900">{{ $client->client_middle_name }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Last Name:</label>
                        <p class="text-gray-900">{{ $client->client_last_name }}</p>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Contact Number:</label>
                        <p class="text-gray-900">{{ $client->client_contact_num }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Address:</label>
                        <p class="text-gray-900">{{ $client->client_address }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">User Type:</label>
                        <p class="text-gray-900">
                            @if($user->user_type_id == 1)
                                Super Admin
                            @elseif($user->user_type_id == 2)
                                Admin
                            @else
                                User
                            @endif
                        </p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Password:</label>
                        <a href="{{ route('user-profile.edit-password') }}" class="text-blue-500 hover:underline">Change Password</a>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 text-center mt-6">
                    <a href="{{ route('user-dashboard.index') }}" class="inline-block px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
