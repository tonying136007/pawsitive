<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

use App\Models\Client;


class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index');
    }

    public function usersTable(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('id', 'email', 'username', 'user_type_id', 'created_at');

            $editUrls = [];
            $users->each(function ($user) use (&$editUrls) {
                $editUrls[$user->id] = route('accounts.edit', $user->id);
            });

            return DataTables::of($users)
                ->addColumn('action', function ($user) use ($editUrls) {
                    $editUrl = $editUrls[$user->id];
                    $deleteUrl = route('accounts.destroy', $user->id);

                    return '<a href="'. $editUrl. '"class="btn btn-primary">Edit</a> 
                            <form method="POST" action="'. $deleteUrl. '"> 
                                @csrf 
                                @method("DELETE") 
                                <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>';
                })
                ->make(true);
        }

        return view('accounts.index');
    }

    public function store()
{
    return view('accounts.store');
}

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type_id' => 'required|integer',
            'client_first_name' => 'required|string|max:255',
            'client_last_name' => 'required|string|max:255',
            'client_middle_name' => 'required|string|max:255',
            'client_address' => 'required|string|max:255',
            'client_contact_num' => 'required|string|max:255',
        ]);
    
        $account = User::create([
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
            'user_type_id' => $validatedData['user_type_id'],
        ]);

        if ($account) {
            $client = Client::create([
                'client_first_name' => $validatedData['client_first_name'],
                'client_last_name' => $validatedData['client_last_name'],
                'client_middle_name' => $validatedData['client_middle_name'],
                'client_address' => $validatedData['client_address'],
                'client_contact_num' => $validatedData['client_contact_num'],
                'user_id' => $account->id,
            ]);
    
            return response()->json(['account' => $account, 'client' => $client], 200);

        } else {
            return response()->json(['error' => 'Failed to create user'], 500);
        }
        
    }

    public function edit(User $account)
    {
        return view('accounts.edit', compact('account'));

    }

    public function update(User $account, Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|string|email|max:255|unique:users,email,'.$account->id,
        'username' => 'required|string|max:255|unique:users,username,'.$account->id,
        'user_type_id' => 'required|integer',
    ]);

    unset($validatedData['password']);

    $account->update($validatedData);

    return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
}


    public function destroy(User $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}