<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegistrationController
{
    public function showRoleSelection(){
        return view('registration.role-selection');
    }
    public function showShelterRoleSelection(){
        return view('registration.shelter.role_selection'); 
    }
    public function showRegistrationForm(){
        return view('registration.form'); 
    }
    public function storeRole(Request $request){
        $request->validate([
            'role' => 'required|in:shelter,User'
        ]);

        session()->put('role', $request->input('role'));

        if (session('role') === 'shelter') {
            return redirect()->route('registration.shelter.role_selection');
        }

        return redirect()->route('registration.form');
    }
    public function storeShelterRole(Request $request){
        $request->validate([
            'role_shelter' => 'required|in:shelterOwner,shelterWorker'
        ]);
    
        session()->put('role_shelter', $request->input('role_shelter'));
        return redirect()->route('registration.form');
    }
    public function create(Request $request)
{
    // Validáció
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed', // Az 'confirmed' biztosítja, hogy a password és a password_confirmation megegyezzen
        'phoneNumber' => 'nullable|string|max:15',
    ]);

    // A session alapján a user típusa
    $type = session('role') === 'shelter' ? session('role_shelter') : session('role');
    $data = [
        'type' => $type,
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'phoneNumber' => $validatedData['phoneNumber'],
    ];

    // Adatok ellenőrzése

    session()->forget(['role', 'menhely_role']); // Session ürítése
    if (User::create($data)) {
        return redirect()->route('home')->with('success', 'Sikeres regisztráció!');
    }
}
}

