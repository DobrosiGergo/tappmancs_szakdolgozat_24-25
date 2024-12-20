@extends('layouts.app')

@section('content')
    <h2>Regisztráció</h2>
    <form action="{{ route('registration.create') }}" method="POST">
        @csrf
        <div>
            <label for="email">E-mail*</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="name">Teljes név*</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Jelszó*</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>   
        <div>
            <label for="password_confirmation">Jelszó megerősítés*</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="phoneNumber">Telefonszám*</label>
            <input type="tel" name="phoneNumber" id="phoneNumber" value="{{ old('phoneNumber') }}">
            @error('phoneNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Fiók létrehozása</button>
        </div>
    </form>
@endsection
