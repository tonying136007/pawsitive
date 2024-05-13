<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function clientTable(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::select('id', 'user_id', 'client_first_name', 'client_last_name', 'client_middle_name', 'client_address', 'client_contact_num', 'created_at');

            $editUrls = [];
            $clients->each(function ($client) use (&$editUrls) {
                $editUrls[$client->id] = route('clients.edit', $client->id);
            });

            return DataTables::of($clients)
                ->addColumn('action', function ($client) use ($editUrls) {
                    $editUrl = $editUrls[$client->id];
                    $deleteUrl = route('clients.destroy', $client->id);

                    return '<a href="'. $editUrl. '"class="btn btn-primary">Edit</a> 
                            <form method="POST" action="'. $deleteUrl. '"> 
                                @csrf 
                                @method("DELETE") 
                                <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>';
                })
                ->make(true);
        }

        return view('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));

    }

    public function update(Client $client, Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|string|email|max:255|unique:users,email,'.$client->id,
        'username' => 'required|string|max:255|unique:users,username,'.$client->id,
        'user_type_id' => 'required|integer',
    ]);

    unset($validatedData['password']);

    $client->update($validatedData);

    return redirect()->route('accounts.index')->with('success', 'Client updated successfully.');
}

    

    

}
