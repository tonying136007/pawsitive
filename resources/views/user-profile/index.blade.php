@extends('layouts.user-layout')

@section('content')
 <!--CARDS-->
 <section class="section0" id="sections">
    <div class="container mx-auto mt-10">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg">
            <div class="bg-blue-500 text-white text-center py-4 rounded-t-lg">
                <h1 class="text-2xl font-semibold">User Profile</h1>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold">Name:</label>
                    <p class="text-gray-900">{{ $user->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold">Email:</label>
                    <p class="text-gray-900">{{ $user->email }}</p>
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
                <div class="text-center mt-6">
                    <a href="{{ route('home') }}" class="inline-block px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    

@endsection
