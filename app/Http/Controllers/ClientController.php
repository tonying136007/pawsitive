<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Client;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function view(Client $client)
    {
        $pets = Pet::where('client_id', $client->id)->get();

        return view('clients.view', compact('pets', 'client'));
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

                    return '<a href="'. $editUrl. '" class="btn btn-primary">Edit</a>
                            <form method="POST" action="'. $deleteUrl. '" style="display:inline;">
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

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'client_first_name' => 'required|string|max:255',
            'client_last_name' => 'required|string|max:255',
            'client_middle_name' => 'required|string|max:255',
            'client_address' => 'required|string|max:255',
            'client_contact_num' => 'required|string|max:255',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
