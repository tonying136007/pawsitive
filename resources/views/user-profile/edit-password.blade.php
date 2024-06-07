@extends('layouts.user-nav-layout')

@section('content')
<!-- Change Password Form -->
<section class="section0" id="sections">
    <div class="container mx-auto mt-10">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg">
            <div class="bg-blue-500 text-white text-center py-4 rounded-t-lg">
                <h1 class="text-2xl font-semibold">Change Password</h1>
            </div>
            <div class="p-6">
                <form action="{{ route('user-profile.update-password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Current Password:</label>
                        <input type="password" name="current_password" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">New Password:</label>
                        <input type="password" name="new_password" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Confirm New Password:</label>
                        <input type="password" name="new_password_confirmation" class="w-full border rounded px-3 py-2">
                    </div>
                    <div class="text-center mt-6">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
