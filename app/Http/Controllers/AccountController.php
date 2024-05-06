<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;


class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.index');
    }

    public function usersTable(Request $request)
{
    if ($request->ajax()) {
        $users = User::select('id', 'name', 'email', 'username', 'user_type_id', 'created_at');

        $editUrls = [];
        $users->each(function ($user) use (&$editUrls) {
            $editUrls[$user->id] = route('users.edit', $user->id);
        });

        return DataTables::of($users)
            ->addColumn('action', function ($user) use ($editUrls) {
                $editUrl = $editUrls[$user->id];
                $deleteUrl = route('users.destroy', $user->id);

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
}