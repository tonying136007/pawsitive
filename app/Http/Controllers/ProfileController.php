<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Load the associated client data
        $client = $user->client;

        // Return the profile view with user and client data
        return view('user-profile.index', compact('user', 'client'));
    }

    public function editPassword()
    {
        return view('user-profile.edit-password');
    }
}
