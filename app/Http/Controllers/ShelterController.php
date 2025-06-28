<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelter;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Storage;

class ShelterController extends Controller
{
    public function setup()
    {
        return view('auth.shelter.setup');
    }
    public function index()
    {
        $shelters = Shelter::with('owner')->get(); // ha kell owner infó is
        return view('shelters.index', compact('shelters'));
    }
    public function show(\App\Models\Shelter $shelter)
    {
        return view('shelters.show', compact('shelter'));
    }

    public function store(Request $request)
    {
        Logger($request);
        Logger('Auth:id: '.auth()->id());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Menhely létrehozása
        $shelter = Shelter::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'owner_id' => auth()->id(),
        ]);
        logger($shelter);

        // Ideiglenes képek kezelése (ha például a Livewire-ben session-ben vagy temp fájlokban tárolod őket)
        if (session()->has('shelter_temp_images')) {
            $uploadedImages = [];

            foreach (session('shelter_temp_images') as $tmpImagePath) {
                $filename = basename($tmpImagePath);
                $newPath = 'shelters/' . $shelter->id . '/' . $filename;

                // Áthelyezés a végleges helyre
                if (Storage::disk('public')->exists($tmpImagePath)) {
                    Storage::disk('public')->move($tmpImagePath, $newPath);
                    $uploadedImages[] = $newPath;
                }
            }
            logger(print_r($uploadedImages));
            // Mentés az adatbázisba
            $shelter->images =$uploadedImages;
            logger($shelter);

            $shelter->save();
            // Tisztítás
            session()->forget('shelter_temp_images');
    }

    return redirect()->route('dashboard');
}

}
