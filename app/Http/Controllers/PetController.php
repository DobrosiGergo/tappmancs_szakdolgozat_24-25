<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetStoreRequest;
use App\Models\Breed;
use App\Models\Pet;
use App\Models\Shelter;
use App\Models\Specie;
use Illuminate\Support\Str;

class PetController extends Controller
{
    public function create()
    {
        $species = Specie::orderBy('name')->get(['id', 'name']);
        $breeds  = Breed::orderBy('name')->get(['id', 'name']);
        $shelter = Shelter::where('owner_id', auth()->id())->firstOrFail();

        return view('pets.create', compact('species', 'breeds', 'shelter'));
    }

    public function store(PetStoreRequest $request)
    {
        $data    = $request->validated();
        $shelter = \App\Models\Shelter::where('owner_id', auth()->id())->firstOrFail();

        $slug = Str::slug($data['name']);

        $paths = [];
        if (session()->has('pet_temp_images')) {
            foreach (session('pet_temp_images') as $tmpPath) {
                $filename = basename($tmpPath);
                $newPath  = 'pets/' . $shelter->uuid . '/' . $filename;

                if (\Storage::disk('public')->exists($tmpPath)) {
                    \Storage::disk('public')->move($tmpPath, $newPath);
                    $paths[] = $newPath;
                }
            }
            session()->forget('pet_temp_images');
        }

        $pet = Pet::create([
            'name'         => $data['name'],
            'slug'         => $slug,
            'species_id'   => $data['species_id'],
            'age'          => $data['age'],
            'arrival_date' => $data['arrival_date'] ?? now(),
            'employee_id'  => auth()->id(),
            'shelter_id'   => $shelter->id,
            'status'       => $data['status'] ?? 'free',
            'description'  => $data['description'],
            'images'       => $paths,
            'breed_id'     => $data['breed_id'],
        ]);

        return redirect()->route('pets.show', $pet)->with('success', 'Kisállat létrehozva.');
    }
}
