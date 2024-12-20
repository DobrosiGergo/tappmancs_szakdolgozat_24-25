@extends('layouts.app')

@section('content')
    <h2>Válaszd ki a szerepkörödet</h2>
    <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <div>
            <button type="submit" name="role" value="User">Örökbefogadó</button>
            <button type="submit" name="role" value="shelter">Menhely</button>
        </div>
    </form>
@endsection