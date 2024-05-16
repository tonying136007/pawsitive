<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PetController extends Controller
{
    public function index()
    {
        return view('pets.index');
    }

    public function petTable(Request $request)
    {
        if ($request->ajax()) {
            $pets = Pet::select('pets.id', 'pets.client_id', 'pets.pet_name', 'pets.pet_type', 'pets.pet_breed', 'pets.pet_bdate', 'pets.created_at', 'clients.client_first_name', 'clients.client_last_name')
                        ->leftJoin('clients', 'pets.client_id', '=', 'clients.id');

            return DataTables::of($pets)
                ->addColumn('client_full_name', function ($pet) {
                    return $pet->client_first_name . ' ' . $pet->client_last_name;
                })
                ->addColumn('action', function ($pet) {
                    $editUrl = route('pets.edit', $pet->id);
                    $deleteUrl = route('pets.destroy', $pet->id);
                    
                    return '<a href="' . $editUrl . '" class="btn btn-primary">Edit</a> ' .
                            '<form id="deleteForm_' . $pet->id . '" method="POST" action="' . $deleteUrl . '"> ' .
                            '<input type="hidden" name="_token" value="' . csrf_token() . '"> ' .
                            '<input type="hidden" name="_method" value="DELETE"> ' .
                            '<button type="submit" class="btn btn-danger">Delete</button> ' .
                            '</form>';
                })
                ->make(true);
        }

        return view('pets.index');
    }

    public function store()
    {
        $clients = Client::all();
        return view('pets.store', compact('clients'));
    }

    public function create(Request $request)
{
    $validatedData = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'pet_name' => 'required|string|max:255',
        'pet_type' => 'required|string|max:255',
        'pet_breed' => 'required|string|max:255',
        'pet_bdate' => 'required|date',
    ]);

    $pet = new Pet([
        'client_id' => $validatedData['client_id'],
        'pet_name' => $validatedData['pet_name'],
        'pet_type' => $validatedData['pet_type'],
        'pet_breed' => $validatedData['pet_breed'],
        'pet_bdate' => $validatedData['pet_bdate'],
    ]);
    
    $pet->save();

    return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
}


    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $validatedData = $request->validate([
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'pet_breed' => 'required|string|max:255',
            'pet_bdate' => 'nullable|date', 
        ]);

        $pet->pet_name = $validatedData['pet_name'];
        $pet->pet_type = $validatedData['pet_type'];
        $pet->pet_breed = $validatedData['pet_breed'];

        if ($request->filled('pet_bdate')) {
            $pet->pet_bdate = $validatedData['pet_bdate'];
        }

        $pet->save();

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}
