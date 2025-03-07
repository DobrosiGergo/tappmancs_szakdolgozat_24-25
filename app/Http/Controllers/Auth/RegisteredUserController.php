<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function showRole():View{
        return view('auth.role_selection');
    }

    public function showShelterRole():View{
        return view('auth.shelter.role_selection');
    }
    public function storeRole(Request $request){
        if(session('role')){
            session()->forget('role');
        }
        $request->validate([
            'role' => 'required|in:shelter,User'
        ]);
        session()->put('role', $request->input('role'));

        if (session('role') === 'shelter') {
            return redirect()->route('registration.shelter.role_selection');
        }
        return redirect()->route('register');

    }
    public function storeShelterRole(Request $request){
        if(session('role_shelter')){
            session()->forget('role_shelter');
        }
        $request->validate([
            'role_shelter' => 'required|in:shelterOwner,shelterWorker'
        ]);
    
        session()->put('role_shelter', $request->input('role_shelter'));
        return redirect()->route('register');
    }
    
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phoneNumber' => 'nullable|string|max:15',

        ]);
        $type = session('role') === 'shelter' ? session('role_shelter') : session('role');
        $data = [
            'type' => $type,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phoneNumber' => $validatedData['phoneNumber'],
        ];
        
        // Log the hash before User::create
        
        $user = User::create($data);
        
        session()->forget(['role', 'menhely_role']); // Session ürítése
    
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
