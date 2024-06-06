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

        // Return the profile view with user data
        return view('user-profile.index', compact('user'));
    }
}
